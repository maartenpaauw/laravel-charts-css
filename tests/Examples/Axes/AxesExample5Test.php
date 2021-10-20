<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Axes;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Axes\AxesExample5;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class AxesExample5Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new AxesExample5();
    }
}
