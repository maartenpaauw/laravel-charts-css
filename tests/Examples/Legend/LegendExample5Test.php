<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Legend;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Legend\LegendExample5;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LegendExample5Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LegendExample5();
    }
}
