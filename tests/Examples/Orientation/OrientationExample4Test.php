<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Orientation;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Orientation\OrientationExample4;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class OrientationExample4Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new OrientationExample4();
    }
}
