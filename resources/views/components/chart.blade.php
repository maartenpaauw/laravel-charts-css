@if($hasColorscheme)
    <x-charts-css-colorscheme :configuration="$configuration" />
@endif

@if($hasLabels)
    <div id="{{ $id }}">
        <x-charts-css-table :datasets="$datasets" :modifications="$configuration->modifications()">
            @if($hasHeading)
                <x-charts-css-heading :heading="$configuration->identity()->description()"/>
            @endif
        </x-charts-css-table>
        <x-charts-css-legend :configuration="$configuration"/>
    </div>
@else
    <x-charts-css-table id="{{ $id }}" :datasets="$datasets" :modifications="$configuration->modifications()">
        @if($hasHeading)
            <x-charts-css-heading :heading="$configuration->identity()->description()"/>
        @endif
    </x-charts-css-table>
@endif
