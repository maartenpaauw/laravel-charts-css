<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Bar;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Bar\BarExample20;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class BarExample20Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new BarExample20();
    }
}
