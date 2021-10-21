<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Legend;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Legend\LegendExample6;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LegendExample6Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LegendExample6();
    }
}
