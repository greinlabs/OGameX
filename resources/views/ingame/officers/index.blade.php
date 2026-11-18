@extends('ingame.layouts.main')

@section('content')
    <div id="officerscomponent">
        <div id="inhalt">
            <div id="planet" class="shortHeader">
                <h2>{{ __('t_ingame.officers.page_title') }}</h2>
            </div>
            <div class="contentRS">
                <div class="mainRS">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    @if ($errors->has('officer'))
                        <div class="alert alert-danger">{{ $errors->first('officer') }}</div>
                    @endif

                    <p>{{ __('t_ingame.officers.balance', ['amount' => number_format($darkMatter)]) }}</p>
                    <p>{{ __('t_ingame.officers.price_duration', ['cost' => number_format($cost), 'days' => $durationDays]) }}</p>

                    <table class="list">
                        <thead>
                        <tr>
                            <th>{{ __('t_ingame.officers.officer') }}</th>
                            <th>{{ __('t_ingame.officers.effect') }}</th>
                            <th>{{ __('t_ingame.officers.status') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($officers as $officer)
                            @php($expiresAt = $activeOfficers[$officer->value])
                            <tr class="{{ $loop->even ? 'alt' : '' }}">
                                <td>{{ __('t_ingame.officers.names.' . $officer->value) }}</td>
                                <td>{{ __('t_ingame.officers.effects.' . $officer->value) }}</td>
                                <td>
                                    @if ($expiresAt)
                                        {{ __('t_ingame.officers.active_until', ['date' => $expiresAt->format('Y-m-d H:i')]) }}
                                    @else
                                        {{ __('t_ingame.officers.inactive') }}
                                    @endif
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('officers.activate') }}">
                                        @csrf
                                        <input type="hidden" name="officer" value="{{ $officer->value }}">
                                        <button class="btn_blue" type="submit">
                                            {{ $expiresAt ? __('t_ingame.officers.extend', ['days' => $durationDays]) : __('t_ingame.officers.hire') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <p>{{ __('t_ingame.officers.commanding_staff') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
