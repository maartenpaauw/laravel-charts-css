<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Column;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Column\ColumnExample2;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColumnExample2Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColumnExample2();
    }
}
