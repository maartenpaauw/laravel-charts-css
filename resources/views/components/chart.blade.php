@if($hasColorscheme)
    <x-charts-css-colorscheme :configuration="$configuration" />
@endif

@if($hasLabels)
    <div id="{{ $id }}">
        <x-charts-css-table :datasets="$datasets" :configuration="$configuration"/>
        <x-charts-css-legend :configuration="$configuration"/>
    </div>
@else
    <x-charts-css-table id="{{ $id }}" :datasets="$datasets" :configuration="$configuration"/>
@endif
