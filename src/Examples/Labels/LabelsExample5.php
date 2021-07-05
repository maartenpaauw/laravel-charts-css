<?php

namespace Maartenpaauw\Chartscss\Examples\Labels;

use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\LabelsAlignStart;
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
