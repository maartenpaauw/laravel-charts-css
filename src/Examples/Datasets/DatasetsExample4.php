<?php

namespace Maartenpaauw\Chart\Examples\Datasets;

use Maartenpaauw\Chart\Appearance\DatasetsSpacing;
use Maartenpaauw\Chart\Appearance\DataSpacing;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Appearance\Multiple;
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

class DatasetsExample4 extends Chart
{
    protected function id(): string
    {
        return 'datasets-example-4';
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
                new Entry(new Value(40, '$40k')),
            ], new Label('1st year')),
            new Dataset([
                new Entry(new Value(30, '$30k')),
                new Entry(new Value(60, '$60k')),
            ], new Label('2nd year')),
            new Dataset([
                new Entry(new Value(40, '$40k')),
                new Entry(new Value(75, '$75k')),
            ], new Label('3rd year')),
            new Dataset([
                new Entry(new Value(50, '$50k')),
                new Entry(new Value(90, '$90k')),
            ], new Label('4th year')),
            new Dataset([
                new Entry(new Value(75, '$75k')),
                new Entry(new Value(100, '$100k')),
            ], new Label('5th year')),
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
            ->withLabel('Asia')
            ->withLabel('Europe')
            ->inline()
            ->squares();
    }

    protected function modifications(): Modifications
    {
        return parent::modifications()
            ->add(new Multiple())
            ->add(new ShowLabels())
            ->add(new DataSpacing(5))
            ->add(new DatasetsSpacing(1));
    }
}
