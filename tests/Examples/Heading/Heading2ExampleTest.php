<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Heading;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Heading\HeadingExample2;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class Heading2ExampleTest extends ExampleTest
{
    protected function chart(): Component
    {
        return new HeadingExample2();
    }
}
