@extends('ingame.layouts.main')

@section('content')
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
            <form action="{{ route('admin.botsettings.update') }}" method="post">
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
                            <div class="fieldwrapper"><label class="styled textBeefy">Resources to spend per cycle (%):</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_resource_spend_percentage" value="{{ $bot_resource_spend_percentage }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Attack and defense allocation (% of stored resources):</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_attack_defense_percentage" value="{{ $bot_attack_defense_percentage }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Research allocation (% of stored resources):</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_research_percentage" value="{{ $bot_research_percentage }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Mining allocation (% of stored resources):</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_mining_percentage" value="{{ $bot_mining_percentage }}"></div></div>
                        </div>

                        <p class="box_highlight textCenter no_buddies">Bot level</p>
                        <div class="group bborder" style="display: block;">
                            <div class="fieldwrapper"><label class="styled textBeefy">Minimum randomized level:</label><div class="thefield"><input type="number" min="0" max="100" class="textInput w130 textCenter textBeefy" name="bot_level_min" value="{{ $bot_level_min }}"></div></div>
                            <div class="fieldwrapper"><label class="styled textBeefy">Maximum randomized level:</label><div class="thefield"><input type="number" min="1" max="100" class="textInput w130 textCenter textBeefy" name="bot_level_max" value="{{ $bot_level_max }}"></div></div>
                        </div>

                        <div class="group bborder" style="display: block;">
                            <div class="fieldwrapper" style="text-align:center;"><input type="submit" class="btn_blue" value="Save bot settings"></div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="content" style="margin-bottom:20px;">
                <div class="buddylistContent">
                    <p class="box_highlight textCenter no_buddies">Manual actions</p>
                    <form method="POST" action="{{ route('admin.botsettings.spawn-bot') }}" style="display:inline-block;">@csrf<input type="submit" class="btn_blue" value="Spawn bot now"></form>
                    <form method="POST" action="{{ route('admin.botsettings.run-bot-attack-round') }}" style="display:inline-block;">@csrf<input type="submit" class="btn_blue" value="Run attack round now"></form>
                </div>
            </div>
        </div>
    </div>
@endsection
