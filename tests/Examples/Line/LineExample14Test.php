<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Line;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Line\LineExample14;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LineExample14Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LineExample14();
    }
}
