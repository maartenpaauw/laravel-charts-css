<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Colors;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Colors\ColorsExample10;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColorsExample10Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColorsExample10();
    }
}
