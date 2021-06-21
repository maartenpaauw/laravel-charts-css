<?php

namespace Maartenpaauw\Chart\Examples\Heading;

use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;

class HeadingExample2 extends Chart
{
    protected function id(): string
    {
        return 'heading-example-2';
    }

    protected function heading(): string
    {
        return 'Visible Chart Heading';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Year', 'Progress'),
            [
                new Dataset([
                    new Entry(new Value(0.2, ''), new Label('2016')),
                    new Entry(new Value(0.4, ''), new Label('2017')),
                    new Entry(new Value(0.6, ''), new Label('2018')),
                    new Entry(new Value(0.8, ''), new Label('2019')),
                    new Entry(new Value(1.0, ''), new Label('2020')),
                ]),
            ],
        );
    }
}
