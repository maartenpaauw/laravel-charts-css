<ul {{ $attributes->class(['charts-css', 'legend'])->class($classes) }}>
@foreach ($labels as $label)
        <li>{{ $label }}</li>
    @endforeach
</ul>
