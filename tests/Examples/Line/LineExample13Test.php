<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Line;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Line\LineExample13;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LineExample13Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LineExample13();
    }
}
