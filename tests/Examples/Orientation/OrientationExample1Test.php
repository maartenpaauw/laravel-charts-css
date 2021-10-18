<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Orientation;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Orientation\OrientationExample1;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class OrientationExample1Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new OrientationExample1();
    }
}
