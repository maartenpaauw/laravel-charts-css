<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Datasets;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Datasets\DatasetsExample3;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class DatasetsExample3Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new DatasetsExample3();
    }
}
