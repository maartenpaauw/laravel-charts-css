<?php

namespace Maartenpaauw\Chartscss\Examples\Bar;

use Maartenpaauw\Chartscss\Appearance\DataSpacing;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\Multiple;
use Maartenpaauw\Chartscss\Appearance\ReverseData;
use Maartenpaauw\Chartscss\Appearance\ReverseDatasets;
use Maartenpaauw\Chartscss\Appearance\ShowDataAxes;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;
use Maartenpaauw\Chartscss\Appearance\ShowPrimaryAxis;
use Maartenpaauw\Chartscss\BarChart;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;

class BarExample25 extends BarChart
{
    protected function id(): string
    {
        return 'bar-example-25';
    }

    protected function heading(): string
    {
        return 'Bar Example #25';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Year', [
                'Progress 1',
                'Progress 2',
                'Progress 3',
                'Progress 4',
                'Progress 5',
            ]),
            new Dataset([
                new Entry(new Value(0.2, '')),
                new Entry(new Value(0.5, '')),
                new Entry(new Value(1, '')),
                new Entry(new Value(0.7, '')),
                new Entry(new Value(0.4, '')),
            ], new Label('2000')),
            new Dataset([
                new Entry(new Value(0.2, '')),
                new Entry(new Value(0.4, '')),
                new Entry(new Value(0.6, '')),
                new Entry(new Value(0.8, '')),
                new Entry(new Value(1, '')),
            ], new Label('2020')),
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
            ->add(new ReverseData())
            ->add(new ReverseDatasets())
            ->add(new DataSpacing(10))
            ->add(new ShowPrimaryAxis())
            ->add(new ShowDataAxes())
            ->add(new ShowLabels());
    }
}
