<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Orientation;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Orientation\OrientationExample5;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class OrientationExample5Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new OrientationExample5();
    }
}
