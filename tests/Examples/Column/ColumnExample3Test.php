<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Column;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Column\ColumnExample3;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColumnExample3Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColumnExample3();
    }
}
