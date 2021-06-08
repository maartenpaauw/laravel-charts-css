<table {{ $attributes->class(['charts-css'])->class($modifications->classes()) }}>
    {{ $slot }}
    @if($datasets->size() === 1)
        <thead>
            <tr>
                <th scope="col">{{ $datasets->axes()->primary() }}</th>
                <th scope="col">{{ $datasets->axes()->data() }}</th>
            </tr>
        </thead>
    @endif
    <tbody>
        @foreach($datasets->toArray() as $dataset)
            @if($datasets->size() === 1)
                @foreach($dataset->entries() as $entry)
                    <tr>
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
