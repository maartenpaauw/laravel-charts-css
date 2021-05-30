<?php

namespace Maartenpaauw\Chart\Configuration;

use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\ShowDataOnHover;
use Maartenpaauw\Chart\Legend\Appearance;
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
        ], new Appearance());
    }

    public function modifications(): ModificationsBag
    {
        return new ModificationsBag([
            new ShowDataOnHover(),
        ]);
    }
}
