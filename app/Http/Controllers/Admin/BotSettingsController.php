<?php

namespace OGame\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use OGame\Http\Controllers\OGameController;
use OGame\Services\BotService;
use OGame\Services\SettingsService;
use Throwable;

class BotSettingsController extends OGameController
{
    public function index(SettingsService $settingsService): View
    {
        $spawnSeconds = (int)$settingsService->get('bot_spawn_interval', 604800);
        $attackSeconds = (int)$settingsService->get('bot_attack_interval', 604800);
        $productionSeconds = (int)$settingsService->get('bot_production_interval', 259200);

        return view('ingame.admin.botsettings')->with([
            'bot_spawn_enabled' => (bool)(int)$settingsService->get('bot_spawn_enabled', 0),
            'bot_spawn_interval_days' => (int)$settingsService->get('bot_spawn_interval_days', max(1, (int)round($spawnSeconds / 86400))),
            'bot_max_count' => (int)$settingsService->get('bot_max_count', 20),
            'bot_inactive_days' => (int)$settingsService->get('bot_inactive_days', 90),
            'bot_attack_enabled' => (bool)(int)$settingsService->get('bot_attack_enabled', 1),
            'bot_attack_interval_days' => (int)$settingsService->get('bot_attack_interval_days', max(1, (int)round($attackSeconds / 86400))),
            'bot_attack_chance' => (int)$settingsService->get('bot_attack_chance', 75),
            'bot_resource_spend_interval_days' => (int)$settingsService->get('bot_resource_spend_interval_days', max(1, (int)round($productionSeconds / 86400))),
            'bot_resource_grant_min' => (int)$settingsService->get('bot_resource_grant_min', 3000),
            'bot_resource_grant_max' => (int)$settingsService->get('bot_resource_grant_max', 25000),
            'bot_attack_defense_percentage' => (int)$settingsService->get('bot_attack_defense_percentage', 30),
            'bot_research_percentage' => (int)$settingsService->get('bot_research_percentage', 10),
            'bot_mining_percentage' => (int)$settingsService->get('bot_mining_percentage', 10),
            'bot_level_min' => (int)$settingsService->get('bot_level_min', 3),
            'bot_level_max' => (int)$settingsService->get('bot_level_max', 25),
        ]);
    }

    public function update(SettingsService $settingsService): RedirectResponse
    {
        $this->validate(request(), [
            'bot_spawn_interval_days' => ['required', 'integer', 'min:1', 'max:3650'],
            'bot_attack_interval_days' => ['required', 'integer', 'min:1', 'max:3650'],
            'bot_resource_spend_interval_days' => ['required', 'integer', 'min:1', 'max:3650'],
            'bot_resource_grant_min' => ['required', 'integer', 'min:0', 'max:1000000000'],
            'bot_resource_grant_max' => ['required', 'integer', 'min:0', 'max:1000000000', 'gte:bot_resource_grant_min'],
            'bot_max_count' => ['required', 'integer', 'min:0', 'max:1000'],
            'bot_inactive_days' => ['required', 'integer', 'min:1', 'max:3650'],
            'bot_attack_chance' => ['required', 'integer', 'min:0', 'max:100'],
            'bot_attack_defense_percentage' => ['required', 'integer', 'min:0', 'max:100'],
            'bot_research_percentage' => ['required', 'integer', 'min:0', 'max:100'],
            'bot_mining_percentage' => ['required', 'integer', 'min:0', 'max:100'],
            'bot_level_min' => ['required', 'integer', 'min:0', 'max:100'],
            'bot_level_max' => ['required', 'integer', 'min:1', 'max:100', 'gte:bot_level_min'],
        ]);

        $spawnDays = (int)request('bot_spawn_interval_days', 7);
        $attackDays = (int)request('bot_attack_interval_days', 3);
        $productionDays = (int)request('bot_resource_spend_interval_days', 3);

        $settingsService->set('bot_spawn_enabled', request('bot_spawn_enabled', 0));
        $settingsService->set('bot_spawn_interval_days', $spawnDays);
        $settingsService->set('bot_spawn_interval', $spawnDays * 86400);
        $settingsService->set('bot_max_count', (int)request('bot_max_count', 20));
        $settingsService->set('bot_inactive_days', (int)request('bot_inactive_days', 90));
        $settingsService->set('bot_attack_enabled', request('bot_attack_enabled', 0));
        $settingsService->set('bot_attack_interval_days', $attackDays);
        $settingsService->set('bot_attack_interval', $attackDays * 86400);
        $settingsService->set('bot_attack_chance', (int)request('bot_attack_chance', 75));
        $settingsService->set('bot_resource_spend_interval_days', $productionDays);
        $settingsService->set('bot_production_interval', $productionDays * 86400);
        $settingsService->set('bot_resource_grant_min', (int)request('bot_resource_grant_min', 3000));
        $settingsService->set('bot_resource_grant_max', (int)request('bot_resource_grant_max', 25000));
        $settingsService->set('bot_attack_defense_percentage', (int)request('bot_attack_defense_percentage', 30));
        $settingsService->set('bot_research_percentage', (int)request('bot_research_percentage', 10));
        $settingsService->set('bot_mining_percentage', (int)request('bot_mining_percentage', 10));
        $settingsService->set('bot_level_min', (int)request('bot_level_min', 3));
        $settingsService->set('bot_level_max', (int)request('bot_level_max', 25));

        return redirect()->route('admin.botsettings.index')->with('success', __('Changes saved!'));
    }

    public function runBotSpawn(BotService $botService): RedirectResponse
    {
        try {
            $bot = $botService->spawnBot();
            return redirect()->route('admin.botsettings.index')->with('success', __('t_ingame.admin.bot_spawn_success', ['bot' => $bot->username]));
        } catch (Throwable $exception) {
            Log::error('Manual bot spawn failed', ['exception' => $exception]);
            return redirect()->route('admin.botsettings.index')->with('error', __('t_ingame.admin.bot_spawn_error'));
        }
    }

    public function runBotAttackRound(BotService $botService): RedirectResponse
    {
        try {
            $result = $botService->runAttackRound();
            if ($result['errors'] !== []) {
                return redirect()->route('admin.botsettings.index')->with('error', __('t_ingame.admin.bot_attack_error'));
            }
            return redirect()->route('admin.botsettings.index')->with('success', __('t_ingame.admin.bot_attack_success', ['attacks' => $result['attacks']]));
        } catch (Throwable $exception) {
            Log::error('Manual bot attack round failed', ['exception' => $exception]);
            return redirect()->route('admin.botsettings.index')->with('error', __('t_ingame.admin.bot_attack_error'));
        }
    }

    public function runBotResourceSpend(BotService $botService): RedirectResponse
    {
        try {
            $result = $botService->forceResourceSpend();
            if ($result['errors'] !== []) {
                return redirect()->route('admin.botsettings.index')->with('error', 'Bot resource spending could not be completed.');
            }
            return redirect()->route('admin.botsettings.index')->with('success', sprintf('Bot resource spending forced: %d items/levels produced.', $result['produced']));
        } catch (Throwable $exception) {
            Log::error('Manual bot resource spending failed', ['exception' => $exception]);
            return redirect()->route('admin.botsettings.index')->with('error', 'Bot resource spending could not be completed.');
        }
    }

    public function grantBotRandomResources(BotService $botService): RedirectResponse
    {
        try {
            $result = $botService->grantRandomResourcesToBots();
            if ($result['errors'] !== []) {
                return redirect()->route('admin.botsettings.index')->with('error', 'Random bot resources could not be granted.');
            }
            return redirect()->route('admin.botsettings.index')->with(
                'success',
                sprintf('Random resources granted to %d bots across %d planets.', $result['bots'], $result['planets'])
            );
        } catch (Throwable $exception) {
            Log::error('Manual random bot resource grant failed', ['exception' => $exception]);
            return redirect()->route('admin.botsettings.index')->with('error', 'Random bot resources could not be granted.');
        }
    }
}
