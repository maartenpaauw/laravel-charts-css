<table {{ $attributes->class(['charts-css'])->class($configuration->modifications()->classes()) }}>
    @hasHeading($configuration)
        <x-charts-css-heading heading="{{ $configuration->identity()->description() }}"/>
    @endhasHeading
    @if($datasets->axes()->primary() || $datasets->axes()->data())
    <thead>
        <tr>
            <th scope="col">{{ $datasets->axes()->primary() }}</th>
            @foreach($datasets->axes()->data() as $axis)
                <th scope="col">{{ $axis }}</th>
            @endforeach
        </tr>
    </thead>
    @endif
    <tbody>
        @foreach($datasets->toArray() as $dataset)
            @if((new \Maartenpaauw\Chartscss\Data\Specifications\HasMultiple())->isSatisfiedBy($datasets))
                <tr>
                    <x-charts-css-label :label="$dataset->label()" />
                    @foreach($dataset->entries() as $entry)
                        <x-charts-css-entry :entry="$entry" />
                    @endforeach
                </tr>
            @else
                @foreach($dataset->entries() as $entry)
                    <tr>
                        <x-charts-css-label :label="$entry->label()" />
                        <x-charts-css-entry :entry="$entry" />
                    </tr>
                @endforeach
            @endif
        @endforeach
    </tbody>
</table>
