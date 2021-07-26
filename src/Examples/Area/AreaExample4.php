<?php

namespace Maartenpaauw\Chartscss\Examples\Area;

use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\AreaChart;
use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;

class AreaExample4 extends AreaChart
{
    protected function id(): string
    {
        return 'area-example-4';
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
                (new Entry(new Value(0.4, '')))
                    ->start(0.2),
                new Entry(new Value(0.8, '')),
                new Entry(new Value(0.6, '')),
                new Entry(new Value(1, '')),
                new Entry(new Value(0.3, '')),
            ]),
        );
    }

    protected function modifications(): Modifications
    {
        return parent::modifications()
            ->add(new HideData());
    }
}
