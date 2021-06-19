@hasColorscheme($configuration)
    <x-charts-css-colorscheme :configuration="$configuration" />
@endhasColorscheme

@hasLabels($configuration)
    <div id="{{ $id }}">
        <x-charts-css-table :datasets="$datasets" :configuration="$configuration"/>
        <x-charts-css-legend :configuration="$configuration"/>
    </div>
@else
    <x-charts-css-table id="{{ $id }}" :datasets="$datasets" :configuration="$configuration"/>
@endhasLabels
