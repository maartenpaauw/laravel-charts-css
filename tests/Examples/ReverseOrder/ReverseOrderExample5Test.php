<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\ReverseOrder;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\ReverseOrder\ReverseOrderExample5;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ReverseOrderExample5Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ReverseOrderExample5();
    }
}
