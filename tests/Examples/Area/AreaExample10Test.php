<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Area;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Area\AreaExample10;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class AreaExample10Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new AreaExample10();
    }
}
