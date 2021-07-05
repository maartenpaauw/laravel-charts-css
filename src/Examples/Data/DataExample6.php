<?php

namespace Maartenpaauw\Chartscss\Examples\Data;

use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Chart;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Types\Area;
use Maartenpaauw\Chartscss\Types\ChartType;

class DataExample6 extends Chart
{
    protected function id(): string
    {
        return 'data-example-6';
    }

    protected function heading(): string
    {
        return 'Data Example #6 - Front End Developer Salary';
    }

    protected function type(): ChartType
    {
        return new Area();
    }

    protected function configuration(): ConfigurationContract
    {
        return new Configuration(
            $this->identity(),
            $this->legend(),
            $this->modifications(),
            $this->colorscheme(),
        );
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new NullAxes(),
            new Dataset([
                (new Entry(new Value(0.4, '$40k')))
                    ->start(0.2),
                new Entry(new Value(0.8, '$80k')),
                new Entry(new Value(0.6, '$60k')),
                new Entry(new Value(1, '$100k')),
                new Entry(new Value(0.3, '$30k')),
            ]),
        );
    }

    protected function modifications(): Modifications
    {
        return parent::modifications()
            ->add(new HideData());
    }
}
