@extends('ingame.layouts.main')

@section('content')
    <div id="traderOverviewcomponent" class="maincontent">
        <div id="traderOverview">
            <div id="inhalt">
                <div id="planet" style="background-position: 0px 0px; height: 250px;" class="detail">
                    <div id="detail" class="detail_screen small">
                        <div id="techDetailLoading"></div>
                    </div>
                    <div id="header_text" style="display: block;">
                        <h2>{{ $title }}</h2>
                        <a class="back_to_overview js_backToOverview tooltip js_hideTipOnMobile right"
                           href="{{ route('merchant.index') }}" data-tooltip-title="{{ __('t_merchant.back') }}"
                           style="display: inline;"></a>
                        <a class="small_back_to_overview js_backToOverview tooltip js_hideTipOnMobile"
                           href="{{ route('merchant.index') }}" data-tooltip-title="{{ __('t_merchant.back') }}"></a>
                    </div>
                </div>
                <div class="c-left c-small"></div>
                <div class="c-right c-small"></div>

                <div class="div_trader">
                    <div class="header">
                        <h2>{{ $title }}</h2>
                    </div>
                    <div class="content">
                        <p class="stimulus clearfix">{{ $description }}</p>
                        <div class="roundBox hints">
                            <h2>{{ __('t_merchant.coming_soon') }}</h2>
                            <p>{{ __('t_merchant.feature_not_implemented') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
