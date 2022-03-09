@hasColorscheme($configuration)
    <x-charts-css-colorscheme :configuration="$configuration" />
@endhasColorscheme

@hasLabels($configuration)
    <{{ $tag }} id="{{ $id }}">
        @if ($displayLegendFirst)
            <x-charts-css-legend :configuration="$configuration"/>
            <x-charts-css-table :datasets="$datasets" :configuration="$configuration"/>
        @else
            <x-charts-css-table :datasets="$datasets" :configuration="$configuration"/>
            <x-charts-css-legend :configuration="$configuration"/>
        @endif
    </{{ $tag }}>
@else
    <x-charts-css-table id="{{ $id }}" :datasets="$datasets" :configuration="$configuration"/>
@endhasLabels
