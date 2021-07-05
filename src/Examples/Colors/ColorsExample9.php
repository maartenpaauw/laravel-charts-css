<?php

namespace Maartenpaauw\Chart\Examples\Colors;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\DataSpacing;
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

class ColorsExample9 extends Chart
{
    protected function id(): string
    {
        return 'colors-example-9';
    }

    protected function heading(): string
    {
        return 'Colors Example #9';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Month', 'Progress'),
            new Dataset([
                new Entry(new Value(48), new Label('Jan')),
                new Entry(new Value(40), new Label('Feb')),
                new Entry(new Value(36), new Label('Mar')),
                new Entry(new Value(38), new Label('Apr')),
                new Entry(new Value(48), new Label('May')),
                new Entry(new Value(60), new Label('Jun')),
                new Entry(new Value(78), new Label('Jul')),
                (new Entry(new Value(88), new Label('Aug')))
                    ->color(new Color('#f84')),
                (new Entry(new Value(96), new Label('Sep')))
                    ->color(new Color('#f84')),
                (new Entry(new Value(100), new Label('Oct')))
                    ->color(new Color('#f84')),
                (new Entry(new Value(97), new Label('Nov')))
                    ->color(new Color('#f84')),
                (new Entry(new Value(84), new Label('Dec')))
                    ->color(new Color('repeating-linear-gradient(135deg, #fdc 0px, #fdc 6px, #f84 6px, #f84 12px)')),
            ])
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
            ->add(new ShowLabels())
            ->add(new HideData())
            ->add(new DataSpacing(5));
    }

    protected function colorscheme(): ColorschemeContract
    {
        return parent::colorscheme()
            ->add(new Color('#fdc'));
    }
}
