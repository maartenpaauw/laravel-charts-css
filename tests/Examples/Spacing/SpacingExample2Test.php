<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Spacing;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Spacing\SpacingExample2;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class SpacingExample2Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new SpacingExample2();
    }
}
