<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Area;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Area\AreaExample3;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class AreaExample3Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new AreaExample3();
    }
}
