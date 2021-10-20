<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Axes;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Axes\AxesExample11;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class AxesExample11Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new AxesExample11();
    }
}
