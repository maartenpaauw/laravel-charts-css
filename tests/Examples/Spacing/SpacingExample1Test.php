<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Spacing;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Spacing\SpacingExample1;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class SpacingExample1Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new SpacingExample1();
    }
}
