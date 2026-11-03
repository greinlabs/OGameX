<?php

namespace OGame\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use OGame\Factories\PlayerServiceFactory;
use OGame\Http\Controllers\OGameController;
use OGame\Models\Ban;
use OGame\Models\Planet;
use OGame\Models\User;

class UserManagementController extends OGameController
{
    public function index(Request $request): View
    {
        $search = trim((string)$request->input('search', ''));
        $status = (string)$request->input('status', 'all');
        $role = (string)$request->input('role', 'all');
        $perPage = min(100, max(10, (int)$request->input('per_page', 25)));

        $query = User::query()
            ->with(['highscore'])
            ->withCount(['bans as active_ban_count' => function ($banQuery) {
                $banQuery->where('canceled', false)
                    ->where(function ($q) {
                        $q->whereNull('banned_until')->orWhere('banned_until', '>', now());
                    });
            }])
            ->where('username', '!=', 'Legor')
            ->orderByDesc('created_at');

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('last_ip', 'like', '%' . $search . '%')
                    ->orWhere('register_ip', 'like', '%' . $search . '%');
            });
        }

        if ($status === 'blocked') {
            $query->whereHas('bans', function ($q) {
                $q->where('canceled', false)
                    ->where(function ($ban) {
                        $ban->whereNull('banned_until')->orWhere('banned_until', '>', now());
                    });
            });
        } elseif ($status === 'online') {
            $query->where('time', '>=', (string)now()->subMinutes(15)->timestamp);
        } elseif ($status === 'offline') {
            $query->where(function ($q) {
                $q->whereNull('time')->orWhere('time', '<', (string)now()->subMinutes(15)->timestamp);
            });
        }

        if ($role === 'admin') {
            $query->whereHas('roles', fn ($q) => $q->where('name', 'admin'));
        } elseif ($role === 'player') {
            $query->whereDoesntHave('roles', fn ($q) => $q->where('name', 'admin'));
        }

        $users = $query->paginate($perPage)->withQueryString();

        $locations = Planet::whereIn('user_id', $users->getCollection()->pluck('id'))
            ->where('destroyed', 0)
            ->orderByRaw('CASE WHEN id = user_id THEN 1 ELSE 0 END DESC')
            ->get(['id', 'user_id', 'galaxy', 'system', 'planet', 'planet_type', 'name'])
            ->groupBy('user_id');

        return view('ingame.admin.users', [
            'users' => $users,
            'locations' => $locations,
            'search' => $search,
            'status' => $status,
            'role' => $role,
            'perPage' => $perPage,
            'perPageOptions' => [10, 25, 50, 100],
        ]);
    }

    public function masquerade(Request $request): RedirectResponse
    {
        $request->validate(['user_id' => ['required', 'integer', 'exists:users,id']]);
        $target = User::findOrFail((int)$request->input('user_id'));
        $current = $request->user();

        if ($current === null || $current->id === $target->id) {
            return redirect()->back()->with('error', __('You cannot impersonate yourself.'));
        }

        app('impersonate')->take($current, $target);

        return redirect()->route('overview.index')
            ->with('success', __('Now impersonating :username', ['username' => $target->username]));
    }

    public function block(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'reason' => ['required', 'string', 'max:1000'],
            'duration' => ['required', 'in:86400,259200,604800,2592000,permanent'],
        ]);

        $user = User::findOrFail((int)$validated['user_id']);
        if ($user->hasRole('admin')) {
            return redirect()->back()->with('error', 'Administrators cannot be blocked.');
        }
        if ($user->isBanned()) {
            return redirect()->back()->with('error', 'User is already blocked.');
        }

        $bannedUntil = $validated['duration'] === 'permanent'
            ? null
            : now()->addSeconds((int)$validated['duration']);

        Ban::create([
            'user_id' => $user->id,
            'reason' => $validated['reason'],
            'banned_until' => $bannedUntil,
            'canceled' => false,
        ]);

        if ($bannedUntil !== null) {
            resolve(PlayerServiceFactory::class)->make($user->id)->activateVacationMode();
        }

        return redirect()->back()->with('success', "User \"{$user->username}\" has been blocked.");
    }

    public function unblock(Request $request): RedirectResponse
    {
        $request->validate(['user_id' => ['required', 'integer', 'exists:users,id']]);
        $user = User::findOrFail((int)$request->input('user_id'));
        $ban = $user->currentBan();

        if ($ban !== null) {
            $ban->update(['canceled' => true, 'canceled_at' => now()]);
        }

        return redirect()->back()->with('success', "User \"{$user->username}\" has been unblocked.");
    }

    public function setAdmin(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'action' => ['required', 'in:grant,revoke'],
        ]);

        $user = User::findOrFail((int)$validated['user_id']);
        if ($validated['action'] === 'revoke' && $request->user()?->id === $user->id) {
            return redirect()->back()->with('error', 'You cannot revoke your own administrator access.');
        }

        if ($validated['action'] === 'grant') {
            $user->assignRole('admin');
        } else {
            $user->removeRole('admin');
        }

        return redirect()->back()->with(
            'success',
            $validated['action'] === 'grant'
                ? "User \"{$user->username}\" is now an administrator."
                : "Administrator access revoked from \"{$user->username}\"."
        );
    }
}
