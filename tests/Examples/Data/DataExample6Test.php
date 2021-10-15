<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Data;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Data\DataExample6;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class DataExample6Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new DataExample6();
    }
}
