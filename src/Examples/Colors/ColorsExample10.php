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

class ColorsExample10 extends Chart
{
    protected function id(): string
    {
        return 'colors-example-10';
    }

    protected function heading(): string
    {
        return 'Colors Example #10';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Month', 'Progress'),
            new Dataset([
                new Entry(new Value(100), new Label('Jan')),
                new Entry(new Value(90), new Label('Feb')),
                new Entry(new Value(100), new Label('Mar')),
                new Entry(new Value(90), new Label('Apr')),
                new Entry(new Value(100), new Label('May')),
                new Entry(new Value(90), new Label('Jun')),
                new Entry(new Value(100), new Label('Jul')),
                new Entry(new Value(90), new Label('Aug')),
                new Entry(new Value(100), new Label('Sep')),
                new Entry(new Value(90), new Label('Oct')),
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
            ->add(new Color('repeating-linear-gradient(#f80, #f80 10px, #e34 10px, #e34 20px);'))
            ->add(new Color('repeating-linear-gradient(45deg, #f80, #f80 10px, #e34 10px, #e34 20px);'))
            ->add(new Color('repeating-linear-gradient(90deg, #f80, #f80 10px, #e34 10px, #e34 20px);'))
            ->add(new Color('repeating-linear-gradient(-45deg, #f80, #f80 10px, #e34 10px, #e34 20px);'))
            ->add(new Color('repeating-linear-gradient(transparent, #e34 20px), repeating-linear-gradient(90deg, transparent, #e34 20px);'))
            ->add(new Color('repeating-radial-gradient(circle, #f80, #f80 10px, #e34 10px, #e34 20px);'))
            ->add(new Color('repeating-radial-gradient(circle at 50% 100%, #f80, #f80 10px, #e34 10px, #e34 20px);'))
            ->add(new Color('repeating-radial-gradient(circle at 50% 0%, #f80, #f80 10px, #e34 10px, #e34 20px);'))
            ->add(new Color('repeating-radial-gradient(circle at 0% 50%, #f80, #f80 10px, #e34 10px, #e34 20px);'))
            ->add(new Color('repeating-radial-gradient(circle at 100% 50%, #f80, #f80 10px, #e34 10px, #e34 20px);'));
    }
}