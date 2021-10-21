<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Column;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Column\ColumnExample21;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColumnExample21Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColumnExample21();
    }
}
