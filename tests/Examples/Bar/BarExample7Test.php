<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Bar;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Bar\BarExample7;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class BarExample7Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new BarExample7();
    }
}
