<?php

namespace Maartenpaauw\Chart\Examples\Labels;

use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
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

class LabelsExample3 extends Chart
{
    protected function id(): string
    {
        return 'labels-example-3';
    }

    protected function heading(): string
    {
        return 'Label Example #3';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Month', 'Progress'),
            new Dataset([
                (new Entry(new Value(30), new Label('Jan')))
                    ->hideLabel(),
                new Entry(new Value(50), new Label('Feb')),
                (new Entry(new Value(80), new Label('Mar')))
                    ->hideLabel(),
                new Entry(new Value(100), new Label('Apr')),
                (new Entry(new Value(65), new Label('May')))
                    ->hideLabel(),
                new Entry(new Value(45), new Label('Jun')),
                (new Entry(new Value(15), new Label('Jul')))
                    ->hideLabel(),
                new Entry(new Value(32), new Label('Aug')),
                (new Entry(new Value(60), new Label('Sep')))
                    ->hideLabel(),
                new Entry(new Value(90), new Label('Oct')),
                (new Entry(new Value(55), new Label('Nov')))
                    ->hideLabel(),
                new Entry(new Value(40), new Label('Dec')),
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

    protected function modifications(): ModificationsBag
    {
        return parent::modifications()
            ->add(new ShowLabels())
            ->add(new HideData());
    }
}
