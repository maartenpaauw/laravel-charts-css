<?php

namespace Maartenpaauw\Chart\Configuration;

use Maartenpaauw\Chart\Configuration\Legend\Legend;

class Configuration
{
    public function id(): string
    {
        return 'my-chart';
    }

    public function heading(): string
    {
        return 'This is my chart';
    }

    public function legend(): Legend
    {
        return new Legend([
            'Label 1',
            'Label 2',
            'Label 3',
        ]);
    }
}
