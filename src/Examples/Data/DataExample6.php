<?php

namespace Maartenpaauw\Chart\Examples\Data;

use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Types\Area;
use Maartenpaauw\Chart\Types\ChartType;

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
