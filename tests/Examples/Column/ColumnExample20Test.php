<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Column;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Column\ColumnExample20;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColumnExample20Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColumnExample20();
    }
}
