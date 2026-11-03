<?php

namespace OGame\Services;

use Exception;
use Throwable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use OGame\Factories\PlanetServiceFactory;
use OGame\Factories\PlayerServiceFactory;
use OGame\GameObjects\Models\Abstracts\GameObject;
use OGame\GameObjects\Models\Units\UnitCollection;
use OGame\Models\Enums\PlanetType;
use OGame\Models\FleetMission;
use OGame\Models\Highscore;
use OGame\Models\Planet;
use OGame\Models\Planet\Coordinate;
use OGame\Models\Resources;
use OGame\Models\User;
use OGame\Services\PlanetService;
use OGame\Services\MessageService;
use OGame\GameMessages\BotActivity;

class BotService
{
    private const BOT_PREFIX = '[BOT]';

    public function __construct(
        private InitialUserDataService $initialUserDataService,
        private PlayerServiceFactory $playerServiceFactory,
        private PlanetServiceFactory $planetServiceFactory,
        private FleetMissionService $fleetMissionService,
        private SettingsService $settingsService,
        private MessageService $messageService
    ) {
    }

    public function runScheduledCycle(): array
    {
        $result = ['spawned' => 0, 'attacks' => 0, 'produced' => 0, 'errors' => []];
        $now = now()->timestamp;
        $cycleLock = Cache::lock('ogamex-bot-cycle', 300);
        if (!$cycleLock->get()) {
            $result['errors'][] = 'Bot cycle is already running.';
            return $result;
        }

        try {
            $this->cleanupInactiveBots();

            $lastSpawn = (int)$this->settingsService->get('bot_last_spawn_at', 0);
            $spawnIntervalDays = (int)$this->settingsService->get('bot_spawn_interval_days', 0);
            $interval = $spawnIntervalDays > 0
                ? $spawnIntervalDays * 86400
                : (int)$this->settingsService->get('bot_spawn_interval', 86400);
            if (
                (bool)(int)$this->settingsService->get('bot_spawn_enabled', 0)
                && ($now - $lastSpawn) >= max(60, $interval)
            ) {
                try {
                    $this->spawnBot();
                    $result['spawned']++;
                    $this->settingsService->set('bot_last_spawn_at', $now);
                } catch (Throwable $e) {
                    Log::error('Scheduled bot spawn failed', ['exception' => $e]);
                    $result['errors'][] = 'Bot spawn failed.';
                }
            }

            $lastAttackSetting = $this->settingsService->get('bot_last_attack_at', '');
            $lastAttack = $lastAttackSetting === '' ? $now : (int)$lastAttackSetting;
            if ($lastAttackSetting === '') {
                $this->settingsService->set('bot_last_attack_at', $now);
            }
            $attackIntervalDays = (int)$this->settingsService->get('bot_attack_interval_days', 0);
            $attackInterval = $attackIntervalDays > 0
                ? $attackIntervalDays * 86400
                : (int)$this->settingsService->get('bot_attack_interval', 604800);
            if (
                (bool)(int)$this->settingsService->get('bot_attack_enabled', 1)
                && ($now - $lastAttack) >= max(60, $attackInterval)
            ) {
                $attackResult = $this->runAttackRound();
                $result['attacks'] = $attackResult['attacks'];
                $result['errors'] = [...$result['errors'], ...$attackResult['errors']];
                $this->settingsService->set('bot_last_attack_at', $now);
            }

            $lastProductionSetting = $this->settingsService->get('bot_last_production_at', '');
            $lastProduction = $lastProductionSetting === '' ? $now : (int)$lastProductionSetting;
            if ($lastProductionSetting === '') {
                $this->settingsService->set('bot_last_production_at', $now);
            }
            $productionIntervalDays = (int)$this->settingsService->get('bot_resource_spend_interval_days', 0);
            $productionInterval = $productionIntervalDays > 0
                ? $productionIntervalDays * 86400
                : (int)$this->settingsService->get('bot_production_interval', 259200);
            if (($now - $lastProduction) >= max(86400, $productionInterval)) {
                $productionResult = $this->produceForBots();
                $result['produced'] = $productionResult['produced'];
                $result['errors'] = [...$result['errors'], ...$productionResult['errors']];
                $this->settingsService->set('bot_last_production_at', $now);
            }
        } finally {
            $cycleLock->release();
        }

        return $result;
    }

    /**
     * Run one probabilistic attack round independently of the configured schedule.
     *
     * @return array{attacks: int, errors: array<string>}
     */
    public function runAttackRound(): array
    {
        $result = ['attacks' => 0, 'errors' => []];
        $chance = min(100, max(0, (int)$this->settingsService->get('bot_attack_chance', 75)));

        foreach (User::where('is_bot', true)->where('vacation_mode', false)->get() as $bot) {
            if (random_int(1, 100) > $chance) {
                continue;
            }

            try {
                if ($this->makeBotAttack($bot) !== null) {
                    $result['attacks']++;
                }
            } catch (Throwable $e) {
                Log::error('Bot attack round failed for bot', ['bot_id' => $bot->id, 'exception' => $e]);
                $result['errors'][] = 'Bot attack failed.';
            }
        }

        return $result;
    }

    /**
     * Spend up to half of each bot planet's stored resources on a randomized mix of ships and defenses.
     *
     * @return array{produced: int, errors: array<string>}
     */
    public function produceForBots(): array
    {
        $result = ['produced' => 0, 'errors' => []];
        $productionLock = Cache::lock('ogamex-bot-production', 300);
        if (!$productionLock->get()) {
            $result['errors'][] = 'Bot production is already running.';
            return $result;
        }

        try {
            $bots = User::where('is_bot', true)->where('vacation_mode', false)->get();
            foreach ($bots as $bot) {
                try {
                    $player = $this->playerServiceFactory->make($bot->id, true);
                    foreach ($player->planets->allPlanets() as $planetService) {
                        $planetId = $planetService->getPlanetId();
                        $produced = DB::transaction(function () use ($planetService, $planetId, $player): int {
                            $planet = Planet::whereKey($planetId)->lockForUpdate()->first();
                            if ($planet === null || (int)$planet->destroyed !== 0) {
                                return 0;
                            }

                            $planetService->setPlanet($planet);
                            $available = $planetService->getResources();
                            $spendPercentage = min(100, max(0, (int)$this->settingsService->get('bot_resource_spend_percentage', 50)));
                            $militaryPercentage = min(100, max(0, (int)$this->settingsService->get('bot_attack_defense_percentage', 30)));
                            $researchPercentage = min(100, max(0, (int)$this->settingsService->get('bot_research_percentage', 10)));
                            $miningPercentage = min(100, max(0, (int)$this->settingsService->get('bot_mining_percentage', 10)));
                            $categoryTotal = $militaryPercentage + $researchPercentage + $miningPercentage;
                            $militaryShare = $categoryTotal > 0 ? $militaryPercentage / $categoryTotal : 0;
                            $budget = new Resources(
                                floor($available->metal->get() * ($spendPercentage / 100) * $militaryShare),
                                floor($available->crystal->get() * ($spendPercentage / 100) * $militaryShare),
                                floor($available->deuterium->get() * ($spendPercentage / 100) * $militaryShare)
                            );
                            if (!$budget->any()) {
                                return 0;
                            }

                            $objects = [
                                ...ObjectService::getShipObjects(),
                                ...ObjectService::getDefenseObjects(),
                            ];
                            $objects = array_values(array_filter(
                                $objects,
                                fn (GameObject $object): bool => ObjectService::objectRequirementsMet($object->machine_name, $planetService)
                                    && ObjectService::objectCharacterClassMet($object->machine_name, $planetService)
                            ));
                            shuffle($objects);

                            $built = 0;
                            foreach ($objects as $object) {
                                $price = $object->price->resources;
                                $amount = $this->getAffordableUnitCount($budget, $price);
                                if ($amount < 1) {
                                    continue;
                                }

                                $amount = random_int(max(1, (int)ceil($amount * 0.75)), $amount);
                                $cost = new Resources(
                                    $price->metal->get() * $amount,
                                    $price->crystal->get() * $amount,
                                    $price->deuterium->get() * $amount
                                );
                                $budget->metal->set($budget->metal->get() - $cost->metal->get());
                                $budget->crystal->set($budget->crystal->get() - $cost->crystal->get());
                                $budget->deuterium->set($budget->deuterium->get() - $cost->deuterium->get());

                                $planetService->addUnit($object->machine_name, $amount, false);
                                $planet->metal -= $cost->metal->get();
                                $planet->crystal -= $cost->crystal->get();
                                $planet->deuterium -= $cost->deuterium->get();
                                $built += $amount;
                            }

                            if ($categoryTotal > 0) {
                                $miningShare = $miningPercentage / $categoryTotal;
                                $researchShare = $researchPercentage / $categoryTotal;
                                $miningCostMetal = floor($available->metal->get() * ($spendPercentage / 100) * $miningShare);
                                $miningCostCrystal = floor($available->crystal->get() * ($spendPercentage / 100) * $miningShare);
                                $miningCostDeuterium = floor($available->deuterium->get() * ($spendPercentage / 100) * $miningShare);

                                if ($miningPercentage > 0
                                    && $planet->metal >= $miningCostMetal
                                    && $planet->crystal >= $miningCostCrystal
                                    && $planet->deuterium >= $miningCostDeuterium) {
                                    $planet->metal -= $miningCostMetal;
                                    $planet->crystal -= $miningCostCrystal;
                                    $planet->deuterium -= $miningCostDeuterium;
                                    $mineFields = ['metal_mine', 'crystal_mine', 'deuterium_synthesizer'];
                                    $mineField = $mineFields[random_int(0, 2)];
                                    $planet->{$mineField} = (int)$planet->{$mineField} + 1;
                                    $built++;
                                }

                                $researchCostMetal = floor($available->metal->get() * ($spendPercentage / 100) * $researchShare);
                                $researchCostCrystal = floor($available->crystal->get() * ($spendPercentage / 100) * $researchShare);
                                $researchCostDeuterium = floor($available->deuterium->get() * ($spendPercentage / 100) * $researchShare);

                                if ($researchPercentage > 0
                                    && $planet->metal >= $researchCostMetal
                                    && $planet->crystal >= $researchCostCrystal
                                    && $planet->deuterium >= $researchCostDeuterium) {
                                    $planet->metal -= $researchCostMetal;
                                    $planet->crystal -= $researchCostCrystal;
                                    $planet->deuterium -= $researchCostDeuterium;
                                    $researchObjects = ObjectService::getResearchObjects();
                                    if ($researchObjects !== []) {
                                        shuffle($researchObjects);
                                        $research = $researchObjects[0];
                                        $currentLevel = $player->getResearchLevel($research->machine_name);
                                        $player->setResearchLevel($research->machine_name, $currentLevel + 1);
                                        $built++;
                                    }
                                }
                            }

                            if ($built > 0) {
                                $planet->save();
                            }
                            return $built;
                        });

                        if ($produced > 0) {
                            $result['produced'] += $produced;
                            User::whereKey($bot->id)->update([
                                'bot_last_action_at' => now(),
                                'time' => (string)now()->timestamp,
                            ]);
                        }
                    }
                } catch (Throwable $e) {
                    Log::error('Bot production failed', ['bot_id' => $bot->id, 'exception' => $e]);
                    $result['errors'][] = 'Bot production failed.';
                }
            }
        } finally {
            $productionLock->release();
        }

        return $result;
    }

    private function getAffordableUnitCount(Resources $budget, Resources $price): int
    {
        $limits = [];
        foreach (['metal', 'crystal', 'deuterium'] as $resource) {
            $unitPrice = $price->{$resource}->get();
            if ($unitPrice > 0) {
                $limits[] = (int)floor($budget->{$resource}->get() / $unitPrice);
            }
        }

        return $limits === [] ? 0 : min($limits);
    }

    public function spawnBot(): User
    {
        $spawnLock = Cache::lock('ogamex-bot-spawn', 60);
        if (!$spawnLock->get()) {
            throw new Exception('Bot spawn is already running.');
        }

        try {
            $maxBots = max(0, (int)$this->settingsService->get('bot_max_count', 20));
            if ($maxBots === 0 || User::where('is_bot', true)->count() >= $maxBots) {
                throw new Exception('Bot limit reached.');
            }

            $bot = DB::transaction(function (): User {
                $name = $this->generateName();
                $bot = User::create([
                    'username' => $name,
                    'email' => strtolower(Str::random(20)) . '@bot.local',
                    'password' => Hash::make(Str::random(40)),
                    'lang' => 'en',
                ]);
                $bot->is_bot = true;
                $bot->first_login = false;
                $bot->bot_last_action_at = now();
                $bot->time = (string)now()->timestamp;
                $bot->register_ip = '127.0.0.1';
                $bot->save();

                $this->initialUserDataService->createFor($bot);

                $minLevel = max(0, (int)$this->settingsService->get('bot_level_min', 3));
                $maxLevel = max($minLevel, (int)$this->settingsService->get('bot_level_max', 25));
                $level = random_int($minLevel, $maxLevel);

                $planet = Planet::where('user_id', $bot->id)->first();
                if ($planet === null) {
                    throw new Exception('Bot planet could not be created.');
                }

                $planet->name = 'Bot Colony';
                $planet->metal = random_int(5000, 500000);
                $planet->crystal = random_int(3000, 300000);
                $planet->deuterium = random_int(1000, 150000);
                $planet->metal_mine = random_int($minLevel, $level);
                $planet->crystal_mine = random_int($minLevel, max($minLevel, (int)($level * 0.8)));
                $planet->deuterium_synthesizer = random_int($minLevel, max($minLevel, (int)($level * 0.6)));
                $planet->solar_plant = random_int($minLevel, max($minLevel, $level));
                $planet->robot_factory = random_int(1, min(10, max(1, $level)));
                $planet->shipyard = random_int(1, min(12, max(1, (int)ceil($level / 2))));
                $planet->research_lab = random_int(1, min(12, max(1, (int)ceil($level / 2))));

                $shipNames = ['light_fighter', 'heavy_fighter', 'cruiser', 'battle_ship', 'bomber', 'destroyer', 'small_cargo', 'large_cargo', 'recycler'];
                foreach ($shipNames as $shipName) {
                    $planet->{$shipName} = random_int(0, max(1, $level * 4));
                }
                $planet->save();

                $player = $this->playerServiceFactory->make($bot->id, true);
                foreach (ObjectService::getResearchObjects() as $research) {
                    $player->setResearchLevel($research->machine_name, random_int(0, min($level, 12)));
                }

                return $bot;
            });

            $bot = $bot->refresh();
        } finally {
            $spawnLock->release();
        }

        $planet = Planet::where('user_id', $bot->id)->first();
        if ($planet === null) {
            throw new Exception('Bot planet could not be created.');
        }
        $this->notifyAdmins(
            $bot->username,
            '[' . $planet->galaxy . ':' . $planet->system . ':' . $planet->planet . ']',
            'Bot created.'
        );

        $player = $this->playerServiceFactory->make($bot->id, true);
        $highscoreService = resolve(HighscoreService::class);
        Highscore::updateOrCreate(['player_id' => $bot->id], [
            'general' => $highscoreService->getPlayerScore($player),
            'economy' => $highscoreService->getPlayerScoreEconomy($player),
            'research' => $highscoreService->getPlayerScoreResearch($player),
            'military' => $highscoreService->getPlayerScoreMilitary($player),
        ]);
        Cache::forget('highscore-player-count-0');
        Cache::forget('highscore-player-count-1');
        foreach (['general', 'economy', 'research', 'military'] as $type) {
            for ($page = 1; $page <= 100; $page++) {
                Cache::forget(sprintf('highscores-%s-%d-0', $type, $page));
                Cache::forget(sprintf('highscores-%s-%d-1', $type, $page));
            }
        }

        return $bot->refresh();
    }

    public function makeBotAttack(User $bot, PlanetService|null $originPlanet = null): FleetMission|null
    {
        $attackLock = Cache::lock('ogamex-bot-attack-' . $bot->id, 120);
        if (!$attackLock->get()) {
            return null;
        }

        try {
            $player = $this->playerServiceFactory->make($bot->id, true);
            $originPlanet ??= $player->planets->current();
            if ($originPlanet === null) {
                return null;
            }

            $candidates = Planet::query()
                ->where('destroyed', false)
                ->where('planet_type', PlanetType::Planet->value)
                ->where('user_id', '!=', $bot->id)
                ->inRandomOrder()
                ->limit(100)
                ->get();
            $targetUsers = User::query()
                ->whereIn('id', $candidates->pluck('user_id')->unique())
                ->get()
                ->keyBy('id');

            $target = null;
            foreach ($candidates as $candidate) {
                $targetUser = $targetUsers->get($candidate->user_id);
                if ($targetUser === null || (bool)$targetUser->vacation_mode) {
                    continue;
                }

                $targetPlayer = $this->playerServiceFactory->make($targetUser->id, true);
                if ($targetPlayer->isNewbie($player) || $targetPlayer->isStrong($player)) {
                    continue;
                }

                $target = $candidate;
                break;
            }
            if ($target === null) {
                return null;
            }

            $units = new UnitCollection();
            foreach (ObjectService::getShipObjects() as $ship) {
                if ($ship->machine_name === 'solar_satellite') {
                    continue;
                }
                $available = (int)$originPlanet->getObjectAmount($ship->machine_name);
                if ($available > 0) {
                    $units->addUnit($ship, $available);
                }
            }
            if (count($units->units) === 0) {
                return null;
            }

            $mission = $this->fleetMissionService->createNewFromPlanet(
                $originPlanet,
                new Coordinate($target->galaxy, $target->system, $target->planet),
                PlanetType::Planet,
                1,
                $units,
                new Resources(),
                100
            );

            User::whereKey($bot->id)->update([
                'bot_last_action_at' => now(),
                'time' => (string)now()->timestamp,
            ]);
            $this->notifyAdmins(
                $bot->username,
                '[' . $target->galaxy . ':' . $target->system . ':' . $target->planet . ']',
                'Bot launched an attack.'
            );

            return $mission;
        } finally {
            $attackLock->release();
        }
    }

    public function cleanupInactiveBots(): int
    {
        // Bots are intentionally retained in this non-destructive cleanup so game
        // references and historical fleet data remain intact. Inactive bots are
        // detached from planets and put into vacation mode for later retention cleanup.
        $days = max(1, (int)$this->settingsService->get('bot_inactive_days', 90));
        $bots = User::where('is_bot', true)
            ->where(function ($query) use ($days) {
                $query->whereNull('bot_last_action_at')
                    ->orWhere('bot_last_action_at', '<', now()->subDays($days));
            })
            ->get();

        $removed = 0;
        foreach ($bots as $bot) {
            DB::transaction(function () use ($bot, &$removed) {
                Planet::where('user_id', $bot->id)->update([
                    'destroyed' => now()->timestamp,
                ]);
                $bot->vacation_mode = true;
                $bot->save();
                $removed++;
            });
        }
        return $removed;
    }

    private function notifyAdmins(string $botName, string $coordinates, string $action): void
    {
        foreach (User::role('admin')->get() as $admin) {
            $this->messageService->sendSystemMessageToPlayer(
                $this->playerServiceFactory->make($admin->id, true),
                BotActivity::class,
                [
                    'bot_name' => $botName,
                    'coordinates' => $coordinates,
                    'action' => $action,
                ]
            );
        }
    }

    private function generateName(): string
    {
        $names = ['Zoomer', 'Zork', 'Blaster', 'Nova', 'Raptor', 'Vortex', 'Orion', 'Cipher', 'NovaX', 'Kraken'];
        for ($attempt = 0; $attempt < 20; $attempt++) {
            $name = self::BOT_PREFIX . ' ' . $names[array_rand($names)] . '-' . random_int(100, 999);
            if (!User::where('username', $name)->exists()) {
                return $name;
            }
        }
        return self::BOT_PREFIX . ' ' . Str::random(12);
    }
}
