<?php

namespace Maartenpaauw\Chartscss\Examples\Colors;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Color;
use Maartenpaauw\Chartscss\Appearance\DataSpacing;
use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modifications;
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

class ColorsExample3 extends Chart
{
    protected function id(): string
    {
        return 'colors-example-3';
    }

    protected function heading(): string
    {
        return 'Colors Example #3';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Month', 'Progress'),
            new Dataset([
                (new Entry(new Value(100), new Label('Jan')))
                    ->color(new Color('#fcc')),
                (new Entry(new Value(50), new Label('Feb')))
                    ->color(new Color('#aea')),
                (new Entry(new Value(80), new Label('Mar')))
                    ->color(new Color('#def')),
                (new Entry(new Value(30), new Label('Apr')))
                    ->color(new Color('#fcc')),
                (new Entry(new Value(50), new Label('May')))
                    ->color(new Color('#aea')),
                (new Entry(new Value(90), new Label('Jun')))
                    ->color(new Color('#def')),
                (new Entry(new Value(100), new Label('Jul')))
                    ->color(new Color('#fcc')),
                (new Entry(new Value(70), new Label('Aug')))
                    ->color(new Color('#aea')),
                (new Entry(new Value(40), new Label('Sep')))
                    ->color(new Color('#def')),
                (new Entry(new Value(60), new Label('Oct')))
                    ->color(new Color('#fcc')),
                (new Entry(new Value(20), new Label('Nov')))
                    ->color(new Color('#aea')),
                (new Entry(new Value(90), new Label('Dec')))
                    ->color(new Color('#def')),
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
}
