<?php

namespace Maartenpaauw\Chartscss\Examples\Stacked;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Color;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\DataSpacing;
use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\Multiple;
use Maartenpaauw\Chartscss\Appearance\ShowHeading;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;
use Maartenpaauw\Chartscss\Appearance\ShowPrimaryAxis;
use Maartenpaauw\Chartscss\Appearance\ShowSecondaryAxes;
use Maartenpaauw\Chartscss\Appearance\Stacked;
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

class StackedExample1 extends BarChart
{
    protected function id(): string
    {
        return 'stacked-example-1';
    }

    protected function heading(): string
    {
        return 'Simple Stacked Bars';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('continent', ['#1', '#2', '#3', '#4']),
            new Dataset([
                new Entry(new Value(50, '50$')),
                new Entry(new Value(50, '50$')),
                new Entry(new Value(30, '30$')),
                new Entry(new Value(20, '20$')),
            ], new Label('America')),
            new Dataset([
                new Entry(new Value(30, '30$')),
                new Entry(new Value(30, '30$')),
                new Entry(new Value(30, '30$')),
                new Entry(new Value(30, '30$')),
            ], new Label('Asia')),
            new Dataset([
                new Entry(new Value(40, '40$')),
                new Entry(new Value(25, '25$')),
                new Entry(new Value(45, '45$')),
                new Entry(new Value(30, '30$')),
            ], new Label('Europe')),
            new Dataset([
                new Entry(new Value(20, '20')),
                new Entry(new Value(20, '20')),
                new Entry(new Value(20, '20')),
                new Entry(new Value(20, '20')),
            ], new Label('Africa')),
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
            ->add(new HideData())
            ->add(new ShowHeading())
            ->add(new ShowLabels())
            ->add(new ShowPrimaryAxis())
            ->add(new ShowSecondaryAxes(5))
            ->add(new DataSpacing(5))
            ->add(new Multiple())
            ->add(new Stacked());
    }

    protected function colorscheme(): ColorschemeContract
    {
        return parent::colorscheme()
            ->add(new Color('rgba(255, 200, 0, 0.6)'))
            ->add(new Color('rgba(255, 150, 0, 0.6)'))
            ->add(new Color('rgba(255,  75, 0, 0.6)'))
            ->add(new Color('rgba(255,   0, 0, 0.6)'));
    }
}
