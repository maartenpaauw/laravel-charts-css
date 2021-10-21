<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Line;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Line\LineExample5;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LineExample5Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LineExample5();
    }
}
