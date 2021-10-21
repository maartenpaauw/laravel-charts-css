<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Line;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Line\LineExample11;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LineExample11Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LineExample11();
    }
}
