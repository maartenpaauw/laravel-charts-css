<?php

namespace Maartenpaauw\Chart\Examples\Data;

use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;

class DataExample3 extends Chart
{
    protected function id(): string
    {
        return 'data-example-3';
    }

    protected function heading(): string
    {
        return 'Data Example #3 - Front End Developer Salary';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new NullAxes(),
            [
                new Dataset([
                    new Entry(new Value(0.4, '')),
                    new Entry(new Value(0.6, '')),
                    new Entry(new Value(0.75, '')),
                    new Entry(new Value(0.9, '')),
                    new Entry(new Value(1, '')),
                ]),
            ],
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
