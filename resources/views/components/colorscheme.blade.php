@once
    @push('charts.css')
        <style>
            {{ $id }} ul, {{ $id }} table {
                @foreach($declarations as $declaration)
                    {{ $declaration }}
                @endforeach
            }
        </style>
    @endpush
@endonce
