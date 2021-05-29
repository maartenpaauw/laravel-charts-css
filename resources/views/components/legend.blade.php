<ul {{ $attributes->class(['charts-css', 'legend'])->class($configuration->appearance->classes()) }}>
@foreach ($configuration->labels as $label)
        <li>{{ $label }}</li>
    @endforeach
</ul>
