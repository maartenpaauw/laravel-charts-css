<?php

namespace Maartenpaauw\Chartscss\Examples\Line;

use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\Multiple;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\LineChart;

class LineExample5 extends LineChart
{
    protected function id(): string
    {
        return 'line-example-5';
    }

    protected function heading(): string
    {
        return 'Line Example #5';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new NullAxes(),
            new Dataset([
                (new Entry(new Value(0.3, '30')))
                    ->start(0.1),
                new Entry(new Value(0.1, '10')),
                new Entry(new Value(0.3, '30')),
                new Entry(new Value(0.1, '10')),
                new Entry(new Value(0.3, '30')),
            ]),
            new Dataset([
                (new Entry(new Value(0.4, '40')))
                    ->start(0.6),
                new Entry(new Value(0.6, '60')),
                new Entry(new Value(0.4, '40')),
                new Entry(new Value(0.6, '60')),
                new Entry(new Value(0.4, '40')),
            ]),
            new Dataset([
                (new Entry(new Value(0.7, '70')))
                    ->start(0.8),
                new Entry(new Value(0.9, '90')),
                new Entry(new Value(0.8, '80')),
                new Entry(new Value(0.8, '80')),
                new Entry(new Value(1, '100')),
            ]),
            new Dataset([
                (new Entry(new Value(0.9, '100')))
                    ->start(0.7),
                new Entry(new Value(0.7, '70')),
                new Entry(new Value(0.9, '90')),
                new Entry(new Value(0.9, '90')),
                new Entry(new Value(0.7, '70')),
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
            ->add(new Multiple())
            ->add(new HideData());
    }
}
