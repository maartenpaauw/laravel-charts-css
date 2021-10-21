<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Labels;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Labels\LabelsExample3;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LabelsExample3Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LabelsExample3();
    }
}
