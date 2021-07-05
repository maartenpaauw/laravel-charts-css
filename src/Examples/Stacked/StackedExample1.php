<?php

namespace Maartenpaauw\Chart\Examples\Stacked;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\DataSpacing;
use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowHeading;
use Maartenpaauw\Chart\Appearance\ShowLabels;
use Maartenpaauw\Chart\Appearance\ShowPrimaryAxis;
use Maartenpaauw\Chart\Appearance\ShowSecondaryAxes;
use Maartenpaauw\Chart\Appearance\Stacked;
use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Types\Bar;
use Maartenpaauw\Chart\Types\ChartType;

class StackedExample1 extends Chart
{
    protected function id(): string
    {
        return 'stacked-example-1';
    }

    protected function heading(): string
    {
        return 'Simple Stacked Bars';
    }

    protected function type(): ChartType
    {
        return new Bar();
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
