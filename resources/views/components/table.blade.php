<table {{ $attributes->class(['charts-css'])->class($configuration->modifications()->classes()) }}>
    @hasHeading($configuration)
        <x-charts-css-heading heading="{{ $configuration->identity()->description() }}"/>
    @endhasHeading
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
                        <x-charts-css-label :label="$entry->label()" />
                        <td style="--start: calc({{ $entry->start() }} / {{ $dataset->max() }}); {{ $entry->declarations()->toString() }}">
                            <span class="data">{!! $entry->value() !!}</span>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <x-charts-css-label :label="$dataset->label()" />
                    @foreach($dataset->entries() as $entry)
                        <td style="--start: calc({{ $entry->start() }} / {{ $datasets->max() }}); {{ $entry->declarations()->toString() }}">
                            <span class="data">{!! $entry->value() !!}</span>
                        </td>
                    @endforeach
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
