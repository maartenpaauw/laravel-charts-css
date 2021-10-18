<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Datasets;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Datasets\DatasetsExample2;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class DatasetsExample2Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new DatasetsExample2();
    }
}
