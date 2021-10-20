<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Labels;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Labels\LabelsExample5;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class LabelsExample5Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new LabelsExample5();
    }
}
