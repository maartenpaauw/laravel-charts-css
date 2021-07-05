<?php

namespace Maartenpaauw\Chartscss\Examples\Colors;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Color;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\DataSpacing;
use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;
use Maartenpaauw\Chartscss\Appearance\ShowPrimaryAxis;
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

class ColorsExample4 extends Chart
{
    protected function id(): string
    {
        return 'colors-example-4';
    }

    protected function heading(): string
    {
        return 'Colors Example #4';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Month', 'Progress'),
            new Dataset([
                new Entry(new Value(60), new Label('Jan')),
                new Entry(new Value(70), new Label('Feb')),
                new Entry(new Value(80), new Label('Mar')),
                new Entry(new Value(90), new Label('Apr')),
                new Entry(new Value(100), new Label('May')),
                new Entry(new Value(100), new Label('Jun')),
                new Entry(new Value(90), new Label('Jul')),
                new Entry(new Value(80), new Label('Aug')),
                new Entry(new Value(70), new Label('Sep')),
                new Entry(new Value(60), new Label('Oct')),
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
            ->add(new ShowLabels())
            ->add(new ShowPrimaryAxis())
            ->add(new DataSpacing(3));
    }

    protected function colorscheme(): ColorschemeContract
    {
        return parent::colorscheme()
            ->add(new Color('rgba(230, 30, 30, 0.2)'))
            ->add(new Color('rgba(230, 30, 30, 0.4)'))
            ->add(new Color('rgba(230, 30, 30, 0.5)'))
            ->add(new Color('rgba(230, 30, 30, 0.6)'))
            ->add(new Color('rgba(230, 30, 30, 1.0)'))
            ->add(new Color('rgba(230, 30, 30, 1.0)'))
            ->add(new Color('rgba(230, 30, 30, 0.8)'))
            ->add(new Color('rgba(230, 30, 30, 0.6)'))
            ->add(new Color('rgba(230, 30, 30, 0.4)'))
            ->add(new Color('rgba(230, 30, 30, 0.2)'));
    }
}
