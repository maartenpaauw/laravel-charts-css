<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Area;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Area\AreaExample7;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class AreaExample7Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new AreaExample7();
    }
}
