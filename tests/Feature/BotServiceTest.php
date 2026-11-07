<?php

namespace Tests\Feature;

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

    public function testDailyProductionBuildsUnitsWithoutSpendingMoreThanHalfOfStoredResources(): void
    {
        $settings = resolve(SettingsService::class);
        $settings->set('bot_max_count', 10);
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

    public function testRandomResourcesCanBeGrantedToAllBotPlanets(): void
    {
        $settings = resolve(SettingsService::class);
        $settings->set('bot_max_count', 10);
        $settings->set('bot_level_min', 5);
        $settings->set('bot_level_max', 5);
        $bot = resolve(BotService::class)->spawnBot();
        $planet = Planet::where('user_id', $bot->id)->firstOrFail();
        $planet->metal = 1000;
        $planet->crystal = 1000;
        $planet->deuterium = 1000;
        $planet->save();

        $result = resolve(BotService::class)->grantRandomResourcesToBots();
        $planet->refresh();

        $this->assertSame(1, $result['bots']);
        $this->assertGreaterThanOrEqual(1, $result['planets']);
        $this->assertSame([], $result['errors']);
        $this->assertGreaterThan(1000, $planet->metal);
        $this->assertGreaterThan(1000, $planet->crystal);
        $this->assertGreaterThan(1000, $planet->deuterium);
    }
}
