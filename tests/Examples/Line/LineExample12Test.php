<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Line;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Line\LineExample12;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LineExample12Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LineExample12();
    }
}
