<?php

namespace Maartenpaauw\Chart\Examples\Colors;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\Modifications;
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

class ColorsExample6 extends Chart
{
    protected function id(): string
    {
        return 'colors-example-6';
    }

    protected function heading(): string
    {
        return 'Colors Example #6';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Month', 'Progress'),
            new Dataset([
                new Entry(new Value(30), new Label('Jan')),
                new Entry(new Value(50), new Label('Feb')),
                new Entry(new Value(80), new Label('Mar')),
                new Entry(new Value(100), new Label('Apr')),
                new Entry(new Value(65), new Label('May')),
                new Entry(new Value(45), new Label('Jun')),
                new Entry(new Value(15), new Label('Jul')),
                new Entry(new Value(32), new Label('Aug')),
                new Entry(new Value(60), new Label('Sep')),
                new Entry(new Value(90), new Label('Oct')),
                new Entry(new Value(55), new Label('Nov')),
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

    protected function modifications(): Modifications
    {
        return parent::modifications()
            ->add(new HideData())
            ->add(new ShowLabels());
    }

    protected function colorscheme(): ColorschemeContract
    {
        return parent::colorscheme()
            ->add(new Color('url("https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Galaxy_Cluster_Abell_1689_%284423351940%29.jpg/544px-Galaxy_Cluster_Abell_1689_%284423351940%29.jpg") top center repeat black'));
    }
}
