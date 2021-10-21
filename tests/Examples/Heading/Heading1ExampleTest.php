<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Heading;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Heading\HeadingExample1;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class Heading1ExampleTest extends ExampleTest
{
    protected function chart(): Component
    {
        return new HeadingExample1();
    }
}
