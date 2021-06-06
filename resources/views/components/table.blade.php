<table {{ $attributes->class(['charts-css'])->class($modifications->classes()) }}>
    {{ $slot }}
    <tbody>
        @foreach($datasets->toArray() as $dataset)
            @if($datasets->size() === 1)
                @foreach($dataset->entries() as $entry)
                    <tr>
                        <td style="--start: calc({{ $entry->start() }} / {{ $dataset->max() }}); --size: calc({{ $entry->raw() }} / {{ $dataset->max() }})">
                            <span class="data">{{ $entry->value() }}</span>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th scope="row">{{ $dataset->label() }}</th>
                    @foreach($dataset->entries() as $entry)
                        <td style="--start: calc({{ $entry->start() }} / {{ $datasets->max() }}); --size: calc({{ $entry->raw() }} / {{ $datasets->max() }})">
                            <span class="data">{{ $entry->value() }}</span>
                        </td>
                    @endforeach
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
