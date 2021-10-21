<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Datasets;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Datasets\DatasetsExample1;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class DatasetsExample1Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new DatasetsExample1();
    }
}
