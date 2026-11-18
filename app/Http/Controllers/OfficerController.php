<?php

namespace OGame\Http\Controllers;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use OGame\Enums\OfficerType;
use OGame\Services\OfficerService;
use OGame\Services\PlayerService;

class OfficerController extends OGameController
{
    public function index(PlayerService $player, OfficerService $officerService): View
    {
        $this->setBodyId('officers');

        return view('ingame.officers.index', [
            'officers' => OfficerType::cases(),
            'activeOfficers' => $officerService->getActiveOfficers($player->getUser()),
            'darkMatter' => $player->getDarkMatter(),
            'cost' => OfficerService::COST,
            'durationDays' => OfficerService::DURATION_DAYS,
        ]);
    }

    public function activate(Request $request, PlayerService $player, OfficerService $officerService): RedirectResponse
    {
        $validated = $request->validate([
            'officer' => 'required|string|in:commander,admiral,engineer,geologist,technocrat',
        ]);

        try {
            $officerService->activate($player->getUser(), OfficerType::from($validated['officer']));
        } catch (Exception $exception) {
            return back()->withErrors(['officer' => $exception->getMessage()]);
        }

        return back()->with('status', __('t_ingame.officers.activated'));
    }
}
