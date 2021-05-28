<div id="{{ $configuration->id() }}">
    @if($configuration->legend()->labels)
        <x-charts-css-legend :configuration="$configuration->legend()"/>
    @endif

    <x-charts-css-table :heading="!!$configuration->heading()">
        @if($configuration->heading())
            <x-charts-css-heading :heading="$configuration->heading()"/>
        @endif
    </x-charts-css-table>
</div>
