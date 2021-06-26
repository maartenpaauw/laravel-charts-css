<?php

namespace Maartenpaauw\Chart\Examples\Datasets;

use Maartenpaauw\Chart\Appearance\DatasetsSpacing;
use Maartenpaauw\Chart\Appearance\DataSpacing;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\ShowLabels;
use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Legend\Legend;

class DatasetsExample1 extends Chart
{
    protected function id(): string
    {
        return 'datasets-example-1';
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

    protected function modifications(): ModificationsBag
    {
        return parent::modifications()
            ->add(new ShowLabels())
            ->add(new DataSpacing(5))
            ->add(new DatasetsSpacing(1));
    }
}
