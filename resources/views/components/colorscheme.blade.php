@once
    @push('charts.css')
        {{ $id }} ul, {{ $id }} table {
            @foreach($declarations as $declaration)
                {{ $declaration }}
            @endforeach
        }
    @endpush
@endonce
