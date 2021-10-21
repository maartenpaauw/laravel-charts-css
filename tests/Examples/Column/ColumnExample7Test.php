<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Column;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Column\ColumnExample7;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColumnExample7Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColumnExample7();
    }
}
