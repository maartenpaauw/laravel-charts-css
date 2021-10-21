<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Column;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Column\ColumnExample4;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColumnExample4Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColumnExample4();
    }
}
