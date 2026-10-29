@php /** @var OGame\Services\PlanetService $planet */ @endphp

<script type="text/javascript">
    var lastBuildingSlot = {
        "showWarning": @if (($planet->getBuildingCount() + 1) >= $planet->getPlanetFieldMax()) true @else false @endif,
        "exemptTechnologyIds": [33, 41],
        "shouldWarnForTechnologyId": function (technologyId) {
            return this.showWarning && this.exemptTechnologyIds.indexOf(Number(technologyId)) === -1;
        },
@if ($planet->isMoon())
        "slotWarning": "This building will use the last available building slot. Expand your Moon Base to obtain more slots. Do you really want to build this building?"
@else
        "slotWarning": "This building will use the last available building slot. Expand your Terraformer to obtain more slots. Are you sure you want to build this building?"
@endif
    };
</script>
