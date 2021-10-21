<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Stacked;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Stacked\StackedExample1;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class StackedExample1Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new StackedExample1();
    }
}
