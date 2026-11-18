@php /** @var OGame\Services\PlayerService $currentPlayer */ @endphp
<div id="adminbar">
    <style>
        #adminbar {
            background: transparent url('/img/admin/admin-menu-bg.jpg') repeat-x;
            font: normal 11px Tahoma, Arial, Helvetica, sans-serif;
            height: 44px;
            left: 0;
            padding: 0;
            position: relative;
            text-align: center;
            top: 0;
            width: 100%;
            z-index: 3000;
        }

        #adminbar #mmoContent {
            align-items: center;
            box-sizing: border-box;
            display: flex;
            height: 44px;
            justify-content: space-between;
            margin: 0 auto;
            max-width: 100%;
            width: 990px;
            position: relative;
        }

        #adminbar #adminLogo {
            flex: 0 0 auto;
            height: 44px;
            width: auto;
            padding: 0 10px 0 0;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            white-space: nowrap;
            font-size: 14px;
            color: #f48406 !important;
            font-weight: bold;
        }

        #adminbar #adminLogo span {
            font-size: 18px;
            vertical-align: middle;
        }

        #adminbar ul {
            list-style: none;
            align-items: center;
            display: flex;
            flex-wrap: nowrap;
            gap: 6px;
            justify-content: flex-end;
            margin: 0;
            padding: 0;
            min-width: 0;
        }

        #adminbar ul li {
            display: block;
            flex: 0 0 auto;
            margin: 0;
        }

        #adminbar ul li a {
            display: block;
            color: #fff;
            background-color: #333;
            padding: 6px 8px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 11px;
            line-height: 1.2;
            white-space: nowrap;
        }

        #adminbar ul li a:hover, #adminbar ul li a.active  {
            background-color: #555;
        }
    </style>
    <div id="mmoContent">
        <div id="adminLogo">
            @if(!empty($isImpersonating))
                {{ __('Masquerading as user') }}
            @else
                Server admin
            @endif
        </div>
        @if(!empty($isImpersonating) && !empty($impersonateLeaveUrl))
            <ul>
                <li>
                    <a href="{{ $impersonateLeaveUrl }}" class="active">
                        {{ __('Exit masquerade') }}
                    </a>
                </li>
            </ul>
        @else
            <ul>
                <li><a class="{{(Request::is('admin/developer-shortcuts') ? 'active' : '') }}" href="{{ route('admin.developershortcuts.index') }}">Developer shortcuts</a></li>
                <li><a class="{{(Request::is('admin/server-settings') ? 'active' : '') }}" href="{{ route('admin.serversettings.index') }}">Server settings</a></li>
                <li><a class="{{(Request::is('admin/bot-settings') ? 'active' : '') }}" href="{{ route('admin.botsettings.index') }}">Bot settings</a></li>
                <li><a class="{{(Request::is('admin/users*') ? 'active' : '') }}" href="{{ route('admin.users.index') }}">Users</a></li>
                <li><a class="{{(Request::is('admin/fleet-timing*') ? 'active' : '') }}" href="{{ route('admin.fleettiming.index') }}">Fleet Timing</a></li>
                <li><a class="{{(Request::is('admin/rules') ? 'active' : '') }}" href="{{ route('admin.rules.index') }}">Rules & Legal</a></li>
                <li><a class="{{(Request::is('admin/server-administration*') ? 'active' : '') }}" href="{{ route('admin.server-administration.index') }}">Server Administration</a></li>
            </ul>
        @endif
    </div>
</div>
