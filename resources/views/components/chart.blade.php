<div id="{{ $configuration->id() }}">
    @if($hasColorscheme)
        <x-charts-css-colorscheme :configuration="$configuration" />
    @endif
    <x-charts-css-table :datasets="$datasets" :modifications="$tableModifications">
        @if($hasHeading)
            <x-charts-css-heading :heading="$configuration->heading()"/>
        @endif
    </x-charts-css-table>

    @if($hasLabels)
        <x-charts-css-legend :configuration="$configuration->legend()"/>
    @endif
</div>
