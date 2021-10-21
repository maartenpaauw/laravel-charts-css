<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Bar;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Bar\BarExample23;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class BarExample23Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new BarExample23();
    }
}
