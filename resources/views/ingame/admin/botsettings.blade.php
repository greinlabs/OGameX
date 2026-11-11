@extends('ingame.layouts.main')

@section('content')
    <style>
        .bot-settings-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
            max-width: 620px;
            margin-left: auto;
            margin-right: auto;
        }
        .bot-settings-actions form,
        .bot-settings-actions > button { display: inline-block; margin: 0; }
        .bot-settings-actions form:nth-child(1),
        .bot-settings-actions form:nth-child(2),
        .bot-settings-actions form:nth-child(3) {
            flex: 0 1 calc(33.333% - 6px);
        }
        .bot-settings-actions form:nth-child(4),
        .bot-settings-actions > button {
            flex: 0 1 calc(50% - 4px);
        }
        .bot-settings-actions .btn_blue { width: 100%; box-sizing: border-box; }
    </style>

    @if (session('success'))
        <script>fadeBox('{{ session('success') }}', false);</script>
    @endif
    @if (session('error'))
        <script>fadeBox('{{ session('error') }}', true);</script>
    @endif

    <div id="resourcesettingscomponent" class="maincontent">
        <div id="planet" class="shortHeader"><h2>Bot settings</h2></div>
        <div id="buttonz">
            <div class="header"><h2>Bot settings</h2></div>
            <form id="bot-settings-form" action="{{ route('admin.botsettings.update') }}" method="post">
                @csrf
                <div class="content">
                    <div class="buddylistContent" style="margin-bottom: 60px;">
                        <p class="box_highlight textCenter no_buddies">Cycle and population</p>
                        <div class="group bborder" style="display: block;">
                            <div class="fieldwrapper"><label class="styled textBeefy">Enable automatic bot spawning:</label><div class="thefield"><square-checkbox class="square-checkbox"><input type="checkbox" id="botSpawnEnabled" name="bot_spawn_enabled" value="1" {{ $bot_spawn_enabled ? 'checked' : '' }}><label for="botSpawnEnabled"></label></square-checkbox></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">New bot every (days):</label><div class="thefield"><input type="number" min="1" max="3650" class="textInput w130 textCenter textBeefy" name="bot_spawn_interval_days" value="{{ $bot_spawn_interval_days }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Maximum bot players:</label><div class="thefield"><input type="number" min="0" max="1000" class="textInput w130 textCenter textBeefy" name="bot_max_count" value="{{ $bot_max_count }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Remove bots after inactivity (days):</label><div class="thefield"><input type="number" min="1" max="3650" class="textInput w130 textCenter textBeefy" name="bot_inactive_days" value="{{ $bot_inactive_days }}"></div></div>
                        </div>

                        <p class="box_highlight textCenter no_buddies">Attacks and resource spending</p>
                        <div class="group bborder" style="display: block;">
                            <div class="fieldwrapper"><label class="styled textBeefy">Enable automatic bot attacks:</label><div class="thefield"><square-checkbox class="square-checkbox"><input type="checkbox" id="botAttackEnabled" name="bot_attack_enabled" value="1" {{ $bot_attack_enabled ? 'checked' : '' }}><label for="botAttackEnabled"></label></square-checkbox></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Attack round every (days):</label><div class="thefield"><input type="number" min="1" max="3650" class="textInput w130 textCenter textBeefy" name="bot_attack_interval_days" value="{{ $bot_attack_interval_days }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Bot attack chance (%):</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_attack_chance" value="{{ $bot_attack_chance }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Bot resource spending cycle (days):</label><div class="thefield"><input type="number" min="1" max="3650" class="textInput w130 textCenter textBeefy" name="bot_resource_spend_interval_days" value="{{ $bot_resource_spend_interval_days }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Attack and defense allocation (% of stored resources):</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_attack_defense_percentage" value="{{ $bot_attack_defense_percentage }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Research allocation (% of stored resources):</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_research_percentage" value="{{ $bot_research_percentage }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Mining allocation (% of stored resources):</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_mining_percentage" value="{{ $bot_mining_percentage }}"></div></div>
                        </div>

                        <p class="box_highlight textCenter no_buddies">Random resource grants</p>
                        <div class="group bborder" style="display: block;">
                            <div class="fieldwrapper"><label class="styled textBeefy">Minimum resources granted per resource:</label><div class="thefield"><input type="number" min="0" max="1000000000" class="textInput w130 textCenter textBeefy" name="bot_resource_grant_min" value="{{ $bot_resource_grant_min }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Maximum resources granted per resource:</label><div class="thefield"><input type="number" min="0" max="1000000000" class="textInput w130 textCenter textBeefy" name="bot_resource_grant_max" value="{{ $bot_resource_grant_max }}"></div></div>
                        </div>

                        <p class="box_highlight textCenter no_buddies">Bot level</p>
                        <div class="group bborder" style="display: block;">
                            <div class="fieldwrapper"><label class="styled textBeefy">Minimum randomized level:</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_level_min" value="{{ $bot_level_min }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Maximum randomized level:</label><div class="thefield"><input type="number" min="1" max="100" class="textInput w130 textCenter textBeefy" name="bot_level_max" value="{{ $bot_level_max }}"></div></div>
                        </div>

                    </div>
                </div>
            </form>
            <div class="content bot-settings-actions" style="margin-bottom:20px;">
                <form method="POST" action="{{ route('admin.botsettings.spawn-bot') }}" style="display:inline-block;">@csrf<input type="submit" class="btn_blue" value="Spawn bot now"></form>
                <form method="POST" action="{{ route('admin.botsettings.run-bot-attack-round') }}" style="display:inline-block;">@csrf<input type="submit" class="btn_blue" value="Run attack round now"></form>
                <form method="POST" action="{{ route('admin.botsettings.run-resource-spend') }}" style="display:inline-block;">@csrf<input type="submit" class="btn_blue" value="Force resource spending"></form>
                <form method="POST" action="{{ route('admin.botsettings.grant-random-resources') }}" style="display:inline-block;">@csrf<input type="submit" class="btn_blue" value="Give random resources to all bots"></form>
                <button type="submit" form="bot-settings-form" class="btn_blue">Save bot settings</button>
            </div>
        </div>
    </div>
@endsection
