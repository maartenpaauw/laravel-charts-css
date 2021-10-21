<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Line;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Line\LineExample15;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LineExample15Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LineExample15();
    }
}
