<style>
    {{$id()}} ul, {{$id()}} table {
        @foreach($declarations() as $declaration)
            {{ $declaration }}
        @endforeach
    }
</style>
