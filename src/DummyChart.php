<?php

namespace Maartenpaauw\Chart;

use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;

class DummyChart extends Chart
{
    protected function id(): string
    {
        return 'dummy-chart';
    }

    protected function heading(): string
    {
        return 'Dummy';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Country', ['Gold', 'Silver', 'Bronze']),
            [
                new Dataset([
                    new Entry('46', 46),
                    new Entry('37', 37),
                    new Entry('38', 38),
                ], 'USA'),
                new Dataset([
                    new Entry('27', 27),
                    new Entry('23', 23),
                    new Entry('17', 17),
                ], 'GBR'),
                new Dataset([
                    new Entry('26', 26),
                    new Entry('18', 18),
                    new Entry('26', 26),
                ], 'CHN'),
            ]
        );
    }
}
