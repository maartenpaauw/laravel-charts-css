<?php

namespace Maartenpaauw\Chartscss\Examples\Datasets;

use Maartenpaauw\Chartscss\Appearance\DatasetsSpacing;
use Maartenpaauw\Chartscss\Appearance\DataSpacing;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\Multiple;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;
use Maartenpaauw\Chartscss\Chart;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Legend\Legend;

class DatasetsExample2 extends Chart
{
    protected function id(): string
    {
        return 'datasets-example-2';
    }

    protected function heading(): string
    {
        return 'Front End Developer Salary';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new NullAxes(),
            new Dataset([
                new Entry(new Value(20, '$20k')),
                new Entry(new Value(30, '$30k')),
                new Entry(new Value(40, '$40k')),
                new Entry(new Value(50, '$50k')),
                new Entry(new Value(75, '$75k')),
            ], new Label('Asia')),
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

    protected function legend(): Legend
    {
        return parent::legend()
            ->withLabel('1st year')
            ->withLabel('2nd year')
            ->withLabel('3rd year')
            ->withLabel('4th year')
            ->withLabel('5th year')
            ->inline()
            ->squares();
    }

    protected function modifications(): Modifications
    {
        return parent::modifications()
            ->add(new Multiple())
            ->add(new ShowLabels())
            ->add(new DataSpacing(10))
            ->add(new DatasetsSpacing(1));
    }
}
