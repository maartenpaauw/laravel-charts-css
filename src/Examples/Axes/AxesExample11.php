<?php

namespace Maartenpaauw\Chartscss\Examples\Axes;

use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\ShowDataAxes;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;
use Maartenpaauw\Chartscss\Appearance\ShowPrimaryAxis;
use Maartenpaauw\Chartscss\Appearance\ShowSecondaryAxes;
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

class AxesExample11 extends BarChart
{
    protected function id(): string
    {
        return 'axes-example-11';
    }

    protected function heading(): string
    {
        return 'Axes Example #11';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Year', 'Progress'),
            new Dataset([
                new Entry(new Value(0.25, ''), new Label('2016')),
                new Entry(new Value(0.5, ''), new Label('2017')),
                new Entry(new Value(0.125, ''), new Label('2018')),
                new Entry(new Value(0.75, ''), new Label('2019')),
                new Entry(new Value(0.25, ''), new Label('2020')),
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
            ->add(new ShowLabels())
            ->add(new ShowPrimaryAxis())
            ->add(new ShowDataAxes())
            ->add(new ShowSecondaryAxes(4));
    }
}
