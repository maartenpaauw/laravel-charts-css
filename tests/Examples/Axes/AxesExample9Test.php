<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Axes;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Axes\AxesExample9;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class AxesExample9Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new AxesExample9();
    }
}