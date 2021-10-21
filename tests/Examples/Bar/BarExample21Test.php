<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Bar;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Bar\BarExample21;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class BarExample21Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new BarExample21();
    }
}
