<?php

namespace Maartenpaauw\Chart\Examples\Legend;

use Maartenpaauw\Chart\Appearance\DataSpacing;
use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowLabels;
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
use Maartenpaauw\Chart\Legend\Legend;

class LegendExample7 extends Chart
{
    protected function id(): string
    {
        return 'legend-example-7';
    }

    protected function heading(): string
    {
        return 'Front End Developer Salary';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Continent', ['2000', '2005', '2010', '2015', '2020']),
            new Dataset([
                new Entry(new Value(20, '$20k')),
                new Entry(new Value(30, '$30k')),
                new Entry(new Value(40, '$40k')),
                new Entry(new Value(50, '$50k')),
                new Entry(new Value(60, '$60k')),
            ], new Label('Asia')),
            new Dataset([
                new Entry(new Value(10, '$10k')),
                new Entry(new Value(30, '$30k')),
                new Entry(new Value(50, '$50k')),
                new Entry(new Value(70, '$70k')),
                new Entry(new Value(90, '$90k')),
            ], new Label('Australia')),
            new Dataset([
                new Entry(new Value(40, '$40k')),
                new Entry(new Value(60, '$60k')),
                new Entry(new Value(75, '$75k')),
                new Entry(new Value(90, '$90k')),
                new Entry(new Value(100, '$100k')),
            ], new Label('Europe')),
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
            ->add(new HideData())
            ->add(new ShowLabels())
            ->add(new DataSpacing(5));
    }

    protected function legend(): Legend
    {
        return parent::legend()
            ->rhombuses()
            ->withLabel('2000')
            ->withLabel('2005')
            ->withLabel('2010')
            ->withLabel('2015')
            ->withLabel('2020');
    }
}
