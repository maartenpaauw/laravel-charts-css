<table {{ $attributes->class(['charts-css'])->class($modifications->classes()) }}>
    {{ $slot }}
    <thead>
        <tr>
            <th scope="col">{{ $datasets->axes()->primary() }}</th>
            @foreach($datasets->axes()->data() as $axis)
                <th scope="col">{{ $axis }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($datasets->toArray() as $dataset)
            @if($datasets->size() === 1)
                @foreach($dataset->entries() as $entry)
                    <tr>
                        <th scope="row" @if($entry->label()->modifications()->toString())class="{{ $entry->label()->modifications()->toString() }}"@endif>{{ $entry->label()->value() }}</th>
                        <td style="--start: calc({{ $entry->start() }} / {{ $dataset->max() }}); --size: calc({{ $entry->raw() }} / {{ $dataset->max() }}); {{ $entry->declarations()->toString() }}">
                            <span class="data">{{ $entry->value() }}</span>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th scope="row">{{ $dataset->label() }}</th>
                    @foreach($dataset->entries() as $entry)
                        <td style="--start: calc({{ $entry->start() }} / {{ $datasets->max() }}); --size: calc({{ $entry->raw() }} / {{ $datasets->max() }}); {{ $entry->declarations()->toString() }}">
                            <span class="data">{{ $entry->value() }}</span>
                        </td>
                    @endforeach
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
