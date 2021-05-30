<div id="{{ $configuration->id() }}">
    <x-charts-css-table :datasets="$datasets" :modifications="$tableModifications">
        @if($configuration->heading())
            <x-charts-css-heading :heading="$configuration->heading()"/>
        @endif
    </x-charts-css-table>

    @if($configuration->legend()->labels)
        <x-charts-css-legend :configuration="$configuration->legend()"/>
    @endif
</div>
