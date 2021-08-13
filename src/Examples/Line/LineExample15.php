<?php

namespace Maartenpaauw\Chartscss\Examples\Line;

use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\Multiple;
use Maartenpaauw\Chartscss\Appearance\ShowDataAxes;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;
use Maartenpaauw\Chartscss\Appearance\ShowPrimaryAxis;
use Maartenpaauw\Chartscss\Appearance\ShowSecondaryAxes;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\LineChart;

class LineExample15 extends LineChart
{
    protected function id(): string
    {
        return 'line-example-15';
    }

    protected function heading(): string
    {
        return 'Line Example #15';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Year', [
                'Progress 1',
                'Progress 2',
                'Progress 3',
            ]),
            new Dataset([
                (new Entry(new Value(0.5, '50')))
                    ->start(0.1),
                new Entry(new Value(0.8, '80')),
                new Entry(new Value(0.4, '40')),
            ], new Label('2000')),
            new Dataset([
                (new Entry(new Value(0.2, '20')))
                    ->start(0),
                new Entry(new Value(0.5, '50')),
                new Entry(new Value(0.3, '30')),
            ], new Label('2010')),
            new Dataset([
                (new Entry(new Value(0.4, '40')))
                    ->start(0.2),
                new Entry(new Value(0.1, '10')),
                new Entry(new Value(0.2, '20')),
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
            ->add(new ShowLabels())
            ->add(new ShowPrimaryAxis())
            ->add(new ShowDataAxes())
            ->add(new ShowSecondaryAxes(4))
            ->add(new HideData());
    }
}
