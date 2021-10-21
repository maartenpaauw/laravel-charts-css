<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Axes;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Axes\AxesExample7;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class AxesExample7Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new AxesExample7();
    }
}
