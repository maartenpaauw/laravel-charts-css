<?php

namespace Maartenpaauw\Chart\Examples\Tooltips;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\DataSpacing;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowLabels;
use Maartenpaauw\Chart\Appearance\ShowPrimaryAxis;
use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Tooltip\Tooltip;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\NullLabel;

class TooltipsExample1 extends Chart
{
    protected function id(): string
    {
        return 'tooltips-example-1';
    }

    protected function heading(): string
    {
        return 'Tooltips Example - 2016 Summer Olympics Medal Table';
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Country', ['Gold', 'Silver', 'Bronze']),
            new Dataset([
                new Entry(new Value(46, '46 <br/> 🥇'), new NullLabel(), new Tooltip('United States took <br /> home 46 gold medals')),
                new Entry(new Value(37, '37 <br/> 🥈'), new NullLabel(), new Tooltip('United States took <br /> home 37 silver medals')),
                new Entry(new Value(38, '38 <br/> 🥉'), new NullLabel(), new Tooltip('United States took <br /> home 38 bronze medals')),
            ], new Label('USA')),
            new Dataset([
                new Entry(new Value(27), new NullLabel(), new Tooltip('Great Britain took <br /> home 27 gold medals')),
                new Entry(new Value(23), new NullLabel(), new Tooltip('Great Britain took <br /> home 23 silver medals')),
                new Entry(new Value(17), new NullLabel(), new Tooltip('Great Britain took <br /> home 17 bronze medals')),
            ], new Label('GBR')),
            new Dataset([
                new Entry(new Value(26), new NullLabel(), new Tooltip('China took <br /> home 26 gold medals')),
                new Entry(new Value(18), new NullLabel(), new Tooltip('China took <br /> home 18 silver medals')),
                new Entry(new Value(26), new NullLabel(), new Tooltip('China took <br /> home 26 bronze medals')),
            ], new Label('CHN')),
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
            ->add(new ShowPrimaryAxis())
            ->add(new DataSpacing(20));
    }

    protected function colorscheme(): ColorschemeContract
    {
        return parent::colorscheme()
        ->add(new Color('#FEE101'))
        ->add(new Color('#D7D7D7'))
        ->add(new Color('#A77044'));
    }
}
