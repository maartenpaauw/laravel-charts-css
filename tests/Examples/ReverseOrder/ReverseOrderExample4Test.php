<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\ReverseOrder;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\ReverseOrder\ReverseOrderExample4;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ReverseOrderExample4Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ReverseOrderExample4();
    }
}
