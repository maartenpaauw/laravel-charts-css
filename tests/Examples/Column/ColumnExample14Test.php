<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Column;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Column\ColumnExample14;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColumnExample14Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColumnExample14();
    }
}
