<?php

namespace Maartenpaauw\Chart\Examples\Labels;

use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\LabelsAlignStart;
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

class LabelsExample5 extends Chart
{
    protected function id(): string
    {
        return 'labels-example-5';
    }

    protected function heading(): string
    {
        return 'Label Example #5';
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
                new Entry(new Value(10)),
                new Entry(new Value(30)),
                new Entry(new Value(50)),
                new Entry(new Value(70)),
                new Entry(new Value(90)),
            ], new Label('2010')),
            new Dataset([
                new Entry(new Value(20)),
                new Entry(new Value(40)),
                new Entry(new Value(60)),
                new Entry(new Value(80)),
                new Entry(new Value(100)),
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
            ->add(new HideData())
            ->add(new LabelsAlignStart());
    }
}
