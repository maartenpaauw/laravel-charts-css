<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Data;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Data\DataExample4;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class DataExample4Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new DataExample4();
    }
}
