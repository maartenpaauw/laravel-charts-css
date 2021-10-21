<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Legend;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Legend\LegendExample2;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LegendExample2Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LegendExample2();
    }
}
