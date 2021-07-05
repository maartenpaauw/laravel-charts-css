<?php

namespace Maartenpaauw\Chart\Examples\Colors;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\DataSpacing;
use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\Modifications;
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

class ColorsExample2 extends Chart
{
    protected function id(): string
    {
        return 'colors-example-2';
    }

    protected function heading(): string
    {
        return 'Colors Example #2';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Month', 'Progress'),
            new Dataset([
                new Entry(new Value(100), new Label('Jan')),
                new Entry(new Value(50), new Label('Feb')),
                new Entry(new Value(80), new Label('Mar')),
                new Entry(new Value(30), new Label('Apr')),
                new Entry(new Value(50), new Label('May')),
                new Entry(new Value(90), new Label('Jun')),
                (new Entry(new Value(100), new Label('Jul')))
                    ->color(new Color('#fc7')),
                new Entry(new Value(70), new Label('Aug')),
                new Entry(new Value(40), new Label('Sep')),
                new Entry(new Value(60), new Label('Oct')),
                new Entry(new Value(20), new Label('Nov')),
                new Entry(new Value(90), new Label('Dec')),
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
            ->add(new DataSpacing(3));
    }

    protected function colorscheme(): ColorschemeContract
    {
        return parent::colorscheme()
            ->add(new Color('#def'));
    }
}
