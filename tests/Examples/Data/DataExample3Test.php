<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Data;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Data\DataExample3;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class DataExample3Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new DataExample3();
    }
}
