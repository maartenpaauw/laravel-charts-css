@once
    @push('charts.css')
        @hasLabels($configuration) {{ $id }} ul, {{ $id }} table @else {{ $id }} @endhasLabels {
            @foreach($declarations as $declaration)
                {!! $declaration !!}
            @endforeach
        }
    @endpush
@endonce
