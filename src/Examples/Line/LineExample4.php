<?php

namespace Maartenpaauw\Chartscss\Examples\Line;

use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\LineChart;

class LineExample4 extends LineChart
{
    protected function id(): string
    {
        return 'line-example-4';
    }

    protected function heading(): string
    {
        return 'Descriptive Chart Heading';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new NullAxes(),
            new Dataset([
                (new Entry(new Value(0.4, '$ 40k')))
                    ->start(0),
                new Entry(new Value(0.2, '$ 20k')),
                new Entry(new Value(0.6, '$ 60k')),
                new Entry(new Value(0.4, '$ 40k')),
                new Entry(new Value(0.8, '$ 80k')),
                new Entry(new Value(0.6, '$ 60k')),
                new Entry(new Value(1, '$ 100k')),
            ]),
        );
    }

    protected function modifications(): Modifications
    {
        return parent::modifications()
            ->add(new HideData());
    }
}
