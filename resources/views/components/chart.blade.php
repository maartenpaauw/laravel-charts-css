<div id="{{ $configuration->identity()->toString() }}">
    @if($hasColorscheme)
        <x-charts-css-colorscheme :configuration="$configuration" />
    @endif
    <x-charts-css-table :datasets="$datasets" :modifications="$configuration->modifications()">
        @if($hasHeading)
            <x-charts-css-heading :heading="$configuration->identity()->description()"/>
        @endif
    </x-charts-css-table>

    @if($hasLabels)
        <x-charts-css-legend :configuration="$configuration"/>
    @endif
</div>
