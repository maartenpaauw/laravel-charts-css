<?php

namespace Maartenpaauw\Chart\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\ShowDataOnHover;
use Maartenpaauw\Chart\Legend\Appearance\Inline;
use Maartenpaauw\Chart\Legend\Appearance\Square;
use Maartenpaauw\Chart\Legend\Legend;

class Configuration
{
    public function id(): string
    {
        return 'my-chart';
    }

    public function heading(): string
    {
        return 'This is my first chart';
    }

    public function legend(): Legend
    {
        return new Legend([
            'Label 1',
            'Label 2',
            'Label 3',
        ], [
            new Inline(),
            new Square(),
        ]);
    }

    public function modifications(): ModificationsBag
    {
        return new ModificationsBag([
            new ShowDataOnHover(),
        ]);
    }

    public function colorscheme(): ColorschemeContract
    {
        return new Colorscheme();
    }
}
