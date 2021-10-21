<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Area;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Area\AreaExample13;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class AreaExample13Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new AreaExample13();
    }
}
