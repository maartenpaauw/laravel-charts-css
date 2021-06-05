<?php

namespace Maartenpaauw\Chart;

use Maartenpaauw\Chart\Data\Dataset;
use Maartenpaauw\Chart\Data\Datasets;
use Maartenpaauw\Chart\Data\DatasetsContract;
use Maartenpaauw\Chart\Data\Entry;

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
        return new Datasets([
            new Dataset([
                new Entry('$20k', 20000),
                new Entry('$30k', 30000),
                new Entry('$40k', 40000),
                new Entry('$50k', 50000),
                new Entry('$75k', 75000),
            ], 'Asia'),
            new Dataset([
                new Entry('$40k', 40000),
                new Entry('$60k', 60000),
                new Entry('$75k', 75000),
                new Entry('$90k', 90000),
                new Entry('$100k', 100000),
            ], 'Europe'),
        ]);
    }
}
