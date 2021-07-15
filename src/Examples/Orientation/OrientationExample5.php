<?php

namespace Maartenpaauw\Chartscss\Examples\Orientation;

use Maartenpaauw\Chartscss\AreaChart;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;

class OrientationExample5 extends AreaChart
{
    protected function id(): string
    {
        return 'orientation-example-5';
    }

    protected function heading(): string
    {
        return 'Orientation Example #5';
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
