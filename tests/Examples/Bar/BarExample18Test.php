<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Bar;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Bar\BarExample18;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class BarExample18Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new BarExample18();
    }
}
