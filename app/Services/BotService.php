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
use OGame\GameObjects\Models\Units\UnitCollection;
use OGame\Models\Enums\PlanetType;
use OGame\Models\FleetMission;
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
        $result = ['spawned' => 0, 'attacks' => 0, 'errors' => []];
        $cycleLock = Cache::lock('ogamex-bot-cycle', 300);
        if (!$cycleLock->get()) {
            $result['errors'][] = 'Bot cycle is already running.';
            return $result;
        }

        try {
            $this->cleanupInactiveBots();

            $lastSpawn = (int)$this->settingsService->get('bot_last_spawn_at', 0);
            $interval = (int)$this->settingsService->get('bot_spawn_interval', 86400);
            if (
                (bool)(int)$this->settingsService->get('bot_spawn_enabled', 0)
                && (time() - $lastSpawn) >= max(60, $interval)
            ) {
                try {
                    $this->spawnBot();
                    $result['spawned']++;
                    $this->settingsService->set('bot_last_spawn_at', time());
                } catch (Throwable $e) {
                    Log::error('Scheduled bot spawn failed', ['exception' => $e]);
                    $result['errors'][] = 'Bot spawn failed.';
                }
            }

            foreach (User::where('is_bot', true)->where('vacation_mode', false)->get() as $bot) {
                $chance = min(100, max(0, (int)$this->settingsService->get('bot_attack_chance', 75)));
                if (random_int(1, 100) <= $chance) {
                    try {
                        if ($this->makeBotAttack($bot) !== null) {
                            $result['attacks']++;
                        }
                    } catch (Throwable $e) {
                        Log::error('Scheduled bot attack failed', ['bot_id' => $bot->id, 'exception' => $e]);
                        $result['errors'][] = 'Bot attack failed.';
                    }
                }
            }
        } finally {
            $cycleLock->release();
        }

        return $result;
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

            $planet = Planet::where('user_id', $bot->id)->first();
            if ($planet !== null) {
                $planetService = $this->planetServiceFactory->make($planet->id, true);
                if ($planetService !== null) {
                    $this->makeBotAttack($bot, $planetService);
                }
            }

            $bot = $bot->refresh();
        } finally {
            $spawnLock->release();
        }

        if ($planet === null) {
            throw new Exception('Bot planet could not be created.');
        }
        $this->notifyAdmins(
            $bot->username,
            '[' . $planet->galaxy . ':' . $planet->system . ':' . $planet->planet . ']',
            'Bot created and initial action scheduled.'
        );

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
                if (
                    $targetUser !== null
                    && !(bool)$targetUser->vacation_mode
                ) {
                    $target = $candidate;
                    break;
                }
            }
            if ($target === null) {
                return null;
            }

            $units = new UnitCollection();
            foreach (ObjectService::getMilitaryShipObjects() as $ship) {
                $available = (int)$originPlanet->getObjectAmount($ship->machine_name);
                if ($available > 0) {
                    $units->addUnit($ship, max(1, (int)floor($available * random_int(25, 100) / 100)));
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
