<?php

namespace Maartenpaauw\Chartscss\Examples\Legend;

use Maartenpaauw\Chartscss\Appearance\DataSpacing;
use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\Multiple;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;
use Maartenpaauw\Chartscss\Chart;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Legend\Legend;

class LegendExample2 extends Chart
{
    protected function id(): string
    {
        return 'legend-example-2';
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
            ->inline()
            ->withLabel('2000')
            ->withLabel('2005')
            ->withLabel('2010')
            ->withLabel('2015')
            ->withLabel('2020');
    }
}
