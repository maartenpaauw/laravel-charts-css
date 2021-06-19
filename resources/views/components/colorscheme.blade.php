@once
    @push('charts.css')
        @if($hasLabels) {{ $id }} ul, {{ $id }} table @else {{ $id }} @endif {
            @foreach($declarations as $declaration)
                {{ $declaration }}
            @endforeach
        }
    @endpush
@endonce
