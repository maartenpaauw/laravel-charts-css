<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Tooltips;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Tooltips\TooltipsExample1;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class TooltipsExample1Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new TooltipsExample1();
    }
}
