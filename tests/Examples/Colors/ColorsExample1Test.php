<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Colors;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Colors\ColorsExample1;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColorsExample1Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColorsExample1();
    }
}
