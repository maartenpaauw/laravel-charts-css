<?php

namespace Maartenpaauw\Chartscss\Examples\Bar;

use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\ReverseOrientation;
use Maartenpaauw\Chartscss\BarChart;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;

class BarExample2 extends BarChart
{
    protected function id(): string
    {
        return 'bar-example-2';
    }

    protected function heading(): string
    {
        return 'Bar Example #2';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new NullAxes(),
            new Dataset([
                new Entry(new Value(0.2, '')),
                new Entry(new Value(0.4, '')),
                new Entry(new Value(0.6, '')),
                new Entry(new Value(0.8, '')),
                new Entry(new Value(1, '')),
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

    protected function modifications(): Modifications
    {
        return parent::modifications()
            ->add(new ReverseOrientation());
    }
}
