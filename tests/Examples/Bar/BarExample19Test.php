<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Bar;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Bar\BarExample19;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class BarExample19Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new BarExample19();
    }
}
