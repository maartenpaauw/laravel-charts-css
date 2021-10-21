<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Legend;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Legend\LegendExample4;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LegendExample4Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LegendExample4();
    }
}
