@extends('ingame.layouts.main')

@section('content')
    @if (session('success'))
        <script>fadeBox('{{ session('success') }}', false);</script>
    @endif
    @if (session('error'))
        <script>fadeBox('{{ session('error') }}', true);</script>
    @endif

    <style>
        .user-admin-table { width: 100%; min-width: 980px; border-collapse: collapse; font-size: 11px; }
        .user-admin-table th, .user-admin-table td { border-bottom: 1px solid #334; padding: 7px 6px; vertical-align: middle; }
        .user-admin-table th { background: #1a2430; text-align: left; }
        .user-admin-table tr:hover { background: rgba(255,255,255,.035); }
        .user-status { display: inline-block; border-radius: 3px; padding: 2px 6px; font-weight: bold; }
        .user-status-online { color: #8fd36a; }
        .user-status-blocked { color: #ff7b7b; }
        .user-status-offline { color: #aaa; }
        .user-status-admin { color: #f4b942; }
        .user-actions-cell { width: 220px; }
        .user-actions { display: flex; flex-direction: column; gap: 4px; width: 220px; }
        .user-action-form { display: flex; width: 100%; margin: 0; gap: 4px; align-items: center; }
        .user-action-form select, .user-action-form input[type="text"] { margin-right: 4px; }
        .user-action-form select { width: 112px; height: 28px; box-sizing: border-box; }
        .user-action-form .btn_blue {
            min-width: 100px;
            height: 28px;
            box-sizing: border-box;
            margin: 0;
            padding: 0 8px;
            white-space: nowrap;
            text-align: center;
        }
        .user-action-form.user-action-single .btn_blue { width: 100%; }
    </style>

    <div id="resourcesettingscomponent" class="maincontent">
        <div id="planet" class="shortHeader"><h2>User Administration</h2></div>
        <div id="buttonz">
            <div class="header"><h2>User Administration</h2></div>
            <div class="content">
                <div class="buddylistContent" style="margin-bottom: 60px;">
                    <p class="box_highlight textCenter no_buddies">Search users</p>
                    <form method="GET" action="{{ route('admin.users.index') }}">
                        <div class="group bborder" style="display: block;">
                            <div class="fieldwrapper">
                                <label class="styled textBeefy">Username / email / IP:</label>
                                <div class="thefield">
                                    <input type="text" name="search" value="{{ $search }}" class="textInput w200 textBeefy" placeholder="Search...">
                                    <select name="status" class="w130">
                                        <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All statuses</option>
                                        <option value="online" {{ $status === 'online' ? 'selected' : '' }}>Online</option>
                                        <option value="offline" {{ $status === 'offline' ? 'selected' : '' }}>Offline</option>
                                        <option value="blocked" {{ $status === 'blocked' ? 'selected' : '' }}>Blocked</option>
                                    </select>
                                    <select name="role" class="w130">
                                        <option value="all" {{ $role === 'all' ? 'selected' : '' }}>All roles</option>
                                        <option value="admin" {{ $role === 'admin' ? 'selected' : '' }}>Administrators</option>
                                        <option value="player" {{ $role === 'player' ? 'selected' : '' }}>Players</option>
                                    </select>
                                    <select name="per_page" class="w130">
                                        @foreach ($perPageOptions as $option)
                                            <option value="{{ $option }}" {{ $perPage === $option ? 'selected' : '' }}>{{ $option }} per page</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" class="btn_blue" value="Search">
                                    <a class="btn_blue" href="{{ route('admin.users.index') }}">Clear</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <p class="box_highlight textCenter no_buddies">
                        Users: <strong>{{ $users->total() }}</strong>
                    </p>

                    <div style="overflow-x: auto;">
                        <table class="user-admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Player</th>
                                    <th>Location</th>
                                    <th>Score</th>
                                    <th>Last activity</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th class="user-actions-cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    @php
                                        $planetList = $locations->get($user->id, collect());
                                        $currentPlanet = $planetList->first(fn ($planet) => $planet->id === (int)$user->planet_current)
                                            ?? $planetList->first();
                                        $lastActivity = (int)$user->time;
                                        if ($user->bot_last_action_at && $user->bot_last_action_at->timestamp > $lastActivity) {
                                            $lastActivity = $user->bot_last_action_at->timestamp;
                                        }
                                        $isBlocked = (int)$user->active_ban_count > 0;
                                        $isAdmin = $user->hasRole('admin');
                                    @endphp
                                    <tr>
                                        <td>#{{ $user->id }}</td>
                                        <td>
                                            <strong>{{ $user->username }}</strong>
                                            @if ($user->is_bot)
                                                <br><span style="color:#888;">Bot</span>
                                            @endif
                                            <br><span style="color:#888;">{{ $user->email }}</span>
                                        </td>
                                        <td>
                                            @if ($currentPlanet)
                                                <strong>{{ $currentPlanet->galaxy }}:{{ $currentPlanet->system }}:{{ $currentPlanet->planet }}</strong>
                                                <br><span style="color:#888;">{{ $currentPlanet->name }}</span>
                                                @if ($planetList->count() > 1)
                                                    <br><span style="color:#888;">+{{ $planetList->count() - 1 }} colony(ies)</span>
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ number_format((int)($user->highscore->general ?? 0)) }}</td>
                                        <td>
                                            @if ($lastActivity > 0)
                                                {{ \Illuminate\Support\Carbon::createFromTimestamp($lastActivity)->format('d.m.Y H:i:s') }}
                                            @else
                                                Never
                                            @endif
                                            @if ($user->isOnline())
                                                <br><span class="user-status user-status-online">Online</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($isBlocked)
                                                <span class="user-status user-status-blocked">Blocked</span>
                                            @else
                                                <span class="user-status user-status-offline">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($isAdmin)
                                                <span class="user-status user-status-admin">Administrator</span>
                                            @else
                                                Player
                                            @endif
                                        </td>
                                        <td class="user-actions-cell">
                                            <div class="user-actions">
                                            @if ($user->id !== auth()->id())
                                                <form method="POST" action="{{ route('admin.users.masquerade') }}" class="user-action-form user-action-single">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    <input type="submit" class="btn_blue" value="Masquerade" {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                                </form>
                                            @endif

                                            @if (!$isAdmin)
                                                @if ($isBlocked)
                                                    <form method="POST" action="{{ route('admin.users.unblock') }}" class="user-action-form user-action-single">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <input type="submit" class="btn_blue" value="Unblock">
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('admin.users.block') }}" class="user-action-form" onsubmit="return confirm('Block this user?')">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <input type="hidden" name="reason" value="Administrative block">
                                                        <select name="duration">
                                                            <option value="86400">1 day</option>
                                                            <option value="259200">3 days</option>
                                                            <option value="604800">7 days</option>
                                                            <option value="2592000">30 days</option>
                                                            <option value="permanent">Permanent</option>
                                                        </select>
                                                        <input type="submit" class="btn_blue" value="Block">
                                                    </form>
                                                @endif
                                            @endif

                                            @if ($isAdmin)
                                                @if ($user->id !== auth()->id())
                                                    <form method="POST" action="{{ route('admin.users.admin') }}" class="user-action-form user-action-single">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <input type="hidden" name="action" value="revoke">
                                                        <input type="submit" class="btn_blue" value="Revoke admin">
                                                    </form>
                                                @endif
                                            @else
                                                <form method="POST" action="{{ route('admin.users.admin') }}" class="user-action-form user-action-single">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    <input type="hidden" name="action" value="grant">
                                                    <input type="submit" class="btn_blue" value="Make admin">
                                                </form>
                                            @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" style="text-align:center; padding:20px;">No users found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div style="margin-top: 10px; text-align:center;">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
