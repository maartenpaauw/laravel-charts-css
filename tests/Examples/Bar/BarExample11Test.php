<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Bar;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Bar\BarExample11;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class BarExample11Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new BarExample11();
    }
}
