<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Stacked;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Stacked\StackedExample4;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class StackedExample4Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new StackedExample4();
    }
}
