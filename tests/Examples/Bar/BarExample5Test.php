<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Bar;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Bar\BarExample5;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class BarExample5Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new BarExample5();
    }
}
