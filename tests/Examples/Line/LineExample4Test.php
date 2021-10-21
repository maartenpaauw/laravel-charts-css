<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Line;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Line\LineExample4;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LineExample4Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LineExample4();
    }
}
