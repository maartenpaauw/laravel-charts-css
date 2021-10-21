<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Line;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Line\LineExample3;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LineExample3Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LineExample3();
    }
}
