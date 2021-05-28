<ul {{ $attributes->class(['charts-css', 'legend', 'legend-inline' => $configuration->inline, 'legend-'.$configuration->shape => $configuration->shape]) }}>
@foreach ($configuration->labels as $label)
        <li>{{ $label }}</li>
    @endforeach
</ul>
