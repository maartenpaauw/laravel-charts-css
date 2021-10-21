<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Bar;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Bar\BarExample10;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class BarExample10Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new BarExample10();
    }
}
