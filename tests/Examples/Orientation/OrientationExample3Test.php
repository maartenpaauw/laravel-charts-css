<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Orientation;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Orientation\OrientationExample3;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class OrientationExample3Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new OrientationExample3();
    }
}
