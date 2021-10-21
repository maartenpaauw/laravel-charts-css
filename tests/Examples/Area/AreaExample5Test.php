<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Area;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Area\AreaExample5;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class AreaExample5Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new AreaExample5();
    }
}
