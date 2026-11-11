<?php

namespace Tests\Feature;

use OGame\Models\BuildingQueue;
use OGame\Models\FleetMission;
use OGame\Models\Planet;
use OGame\Models\User;
use OGame\Services\BotService;
use OGame\Services\SettingsService;
use Tests\IsolatedAccountTestCase;

class BotServiceTest extends IsolatedAccountTestCase
{
    public function testManualSpawnUsesConfiguredLevelAndDoesNotLaunchAnAttack(): void
    {
        $settings = resolve(SettingsService::class);
        $settings->set('bot_max_count', 10);
        $settings->set('bot_level_min', 5);
        $settings->set('bot_level_max', 5);

        $bot = resolve(BotService::class)->spawnBot();
        $planet = Planet::where('user_id', $bot->id)->firstOrFail();

        $this->assertTrue((bool)$bot->is_bot);
        $this->assertSame(5, (int)$planet->metal_mine);
        $this->assertSame(0, FleetMission::where('user_id', $bot->id)->count());
    }

    public function testSpawnScheduleRunsWithoutRunningTheAttackSchedule(): void
    {
        $settings = resolve(SettingsService::class);
        $settings->set('bot_spawn_enabled', 1);
        $settings->set('bot_spawn_interval', 86400);
        $settings->set('bot_last_spawn_at', now()->subDay()->timestamp);
        $settings->set('bot_max_count', 10);
        $settings->set('bot_attack_enabled', 1);
        $settings->set('bot_attack_interval', 604800);
        $settings->set('bot_last_attack_at', now()->timestamp);
        $settings->set('bot_last_production_at', now()->timestamp);

        $result = resolve(BotService::class)->runScheduledCycle();

        $this->assertSame(1, $result['spawned']);
        $this->assertSame(0, $result['attacks']);
        $this->assertSame([], $result['errors']);
        $botIds = User::where('is_bot', true)->pluck('id');
        $this->assertSame(0, FleetMission::whereIn('user_id', $botIds)->count());
    }

    public function testFirstScheduledProductionRunsImmediatelyAndSpendsResources(): void
    {
        $settings = resolve(SettingsService::class);
        $settings->set('bot_max_count', 10);
        $settings->set('bot_attack_enabled', 0);
        $settings->set('bot_resource_spend_interval_days', 1);
        $settings->set('bot_last_production_at', '');
        $settings->set('bot_attack_defense_percentage', 50);
        $settings->set('bot_research_percentage', 0);
        $settings->set('bot_mining_percentage', 0);

        $bot = resolve(BotService::class)->spawnBot();
        $planet = Planet::where('user_id', $bot->id)->firstOrFail();
        $planet->metal = 100000;
        $planet->crystal = 100000;
        $planet->deuterium = 100000;
        $planet->save();
        $before = [
            'metal' => (float)$planet->metal,
            'crystal' => (float)$planet->crystal,
            'deuterium' => (float)$planet->deuterium,
        ];

        $result = resolve(BotService::class)->runScheduledCycle();
        $planet->refresh();

        $this->assertGreaterThan(0, $result['produced']);
        $this->assertSame([], $result['errors']);
        $this->assertLessThan($before['metal'], $planet->metal);
        $this->assertLessThan($before['crystal'], $planet->crystal);
        $this->assertLessThan($before['deuterium'], $planet->deuterium);
    }

    public function testDailyProductionBuildsUnitsWithoutSpendingMoreThanHalfOfStoredResources(): void
    {
        $settings = resolve(SettingsService::class);
        $settings->set('bot_max_count', 10);
        $settings->set('bot_attack_defense_percentage', 50);
        $settings->set('bot_research_percentage', 0);
        $settings->set('bot_mining_percentage', 0);
        $bot = resolve(BotService::class)->spawnBot();
        $planet = Planet::where('user_id', $bot->id)->firstOrFail();
        $planet->metal = 100000;
        $planet->crystal = 100000;
        $planet->deuterium = 100000;
        $planet->save();

        $result = resolve(BotService::class)->produceForBots();
        $planet->refresh();

        $this->assertGreaterThan(0, $result['produced']);
        $this->assertSame([], $result['errors']);
        $this->assertGreaterThanOrEqual(50000, $planet->metal);
        $this->assertGreaterThanOrEqual(50000, $planet->crystal);
        $this->assertGreaterThanOrEqual(50000, $planet->deuterium);
    }

    public function testMineUpgradeFromProductionSpendingUsesTheBuildingQueue(): void
    {
        $settings = resolve(SettingsService::class);
        $settings->set('bot_max_count', 10);
        $settings->set('bot_attack_defense_percentage', 0);
        $settings->set('bot_research_percentage', 0);
        $settings->set('bot_mining_percentage', 100);

        $bot = resolve(BotService::class)->spawnBot();
        $planet = Planet::where('user_id', $bot->id)->firstOrFail();
        $planet->metal = 1000000;
        $planet->crystal = 1000000;
        $planet->deuterium = 1000000;
        $planet->save();

        $beforeLevels = [
            'metal_mine' => (int)$planet->metal_mine,
            'crystal_mine' => (int)$planet->crystal_mine,
            'deuterium_synthesizer' => (int)$planet->deuterium_synthesizer,
        ];

        $result = resolve(BotService::class)->produceForBots();
        $planet->refresh();

        $this->assertSame([], $result['errors']);
        $this->assertGreaterThan(0, $result['produced']);
        $this->assertSame($beforeLevels['metal_mine'], $planet->metal_mine);
        $this->assertSame($beforeLevels['crystal_mine'], $planet->crystal_mine);
        $this->assertSame($beforeLevels['deuterium_synthesizer'], $planet->deuterium_synthesizer);
        $this->assertGreaterThan(0, BuildingQueue::where('planet_id', $planet->id)
            ->where('processed', 0)
            ->count());
    }

    public function testRandomResourcesCanBeGrantedToAllBotPlanets(): void
    {
        $settings = resolve(SettingsService::class);
        $settings->set('bot_max_count', 10);
        $settings->set('bot_level_min', 2);
        $settings->set('bot_level_max', 5);
        $settings->set('bot_resource_grant_min', 3000);
        $settings->set('bot_resource_grant_max', 6000);
        $bot = resolve(BotService::class)->spawnBot();
        $planet = Planet::where('user_id', $bot->id)->firstOrFail();
        $planet->metal = 1000;
        $planet->crystal = 1000;
        $planet->deuterium = 1000;
        $planet->metal_max = 1000;
        $planet->crystal_max = 1000;
        $planet->deuterium_max = 1000;
        $planet->save();

        $result = resolve(BotService::class)->grantRandomResourcesToBots();
        $planet->refresh();

        $this->assertSame(1, $result['bots']);
        $this->assertGreaterThanOrEqual(1, $result['planets']);
        $this->assertSame([], $result['errors']);
        $this->assertGreaterThanOrEqual(3000, $planet->metal);
        $this->assertLessThanOrEqual(6000, $planet->metal);
        $this->assertGreaterThanOrEqual(3000, $planet->crystal);
        $this->assertLessThanOrEqual(6000, $planet->crystal);
        $this->assertGreaterThanOrEqual(3000, $planet->deuterium);
        $this->assertLessThanOrEqual(6000, $planet->deuterium);

        $afterFirstClick = [
            'metal' => (float)$planet->metal,
            'crystal' => (float)$planet->crystal,
            'deuterium' => (float)$planet->deuterium,
        ];

        $secondResult = resolve(BotService::class)->grantRandomResourcesToBots();
        $planet->refresh();

        $this->assertSame([], $secondResult['errors']);
        $this->assertGreaterThan($afterFirstClick['metal'], $planet->metal);
        $this->assertGreaterThan($afterFirstClick['crystal'], $planet->crystal);
        $this->assertGreaterThan($afterFirstClick['deuterium'], $planet->deuterium);
    }

    public function testResourceGrantRangeIsIndependentFromBotSpawnLevels(): void
    {
        $settings = resolve(SettingsService::class);
        $settings->set('bot_max_count', 10);
        $settings->set('bot_level_min', 5);
        $settings->set('bot_level_max', 5);
        $settings->set('bot_resource_grant_min', 7000);
        $settings->set('bot_resource_grant_max', 7000);

        $bot = resolve(BotService::class)->spawnBot();
        $planet = Planet::where('user_id', $bot->id)->firstOrFail();
        $before = [
            'metal' => (float)$planet->metal,
            'crystal' => (float)$planet->crystal,
            'deuterium' => (float)$planet->deuterium,
        ];

        $result = resolve(BotService::class)->grantRandomResourcesToBots();
        $planet->refresh();

        $this->assertSame([], $result['errors']);
        $this->assertSame(5, (int)$planet->metal_mine);
        $this->assertSame(7000.0, (float)$planet->metal - $before['metal']);
        $this->assertSame(7000.0, (float)$planet->crystal - $before['crystal']);
        $this->assertSame(7000.0, (float)$planet->deuterium - $before['deuterium']);
    }
}
