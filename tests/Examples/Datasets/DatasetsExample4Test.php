<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Datasets;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Datasets\DatasetsExample4;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class DatasetsExample4Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new DatasetsExample4();
    }
}
