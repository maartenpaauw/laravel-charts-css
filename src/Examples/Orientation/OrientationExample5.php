<?php

namespace Maartenpaauw\Chart\Examples\Orientation;

use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Types\Area;
use Maartenpaauw\Chart\Types\ChartType;

class OrientationExample5 extends Chart
{
    protected function id(): string
    {
        return 'orientation-example-5';
    }

    protected function heading(): string
    {
        return 'Orientation Example #5';
    }

    protected function type(): ChartType
    {
        return new Area();
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Year', 'Progress'),
            new Dataset([
                (new Entry(new Value(0.4, ''), new Label('2016')))
                    ->start(0.2),
                new Entry(new Value(0.8, ''), new Label('2017')),
                new Entry(new Value(0.6, ''), new Label('2018')),
                new Entry(new Value(1, ''), new Label('2019')),
                new Entry(new Value(0.3, ''), new Label('2020')),
            ]),
        );
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
}
