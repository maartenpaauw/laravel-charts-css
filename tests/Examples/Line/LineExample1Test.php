<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Line;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Line\LineExample1;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LineExample1Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LineExample1();
    }
}
