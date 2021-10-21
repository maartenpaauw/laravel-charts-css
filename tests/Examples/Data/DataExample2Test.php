<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Data;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Data\DataExample2;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class DataExample2Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new DataExample2();
    }
}
