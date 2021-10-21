<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Colors;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Colors\ColorsExample9;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColorsExample9Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColorsExample9();
    }
}
