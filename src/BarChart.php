<?php

namespace Maartenpaauw\Chartscss;

use Maartenpaauw\Chartscss\Types\Bar;
use Maartenpaauw\Chartscss\Types\ChartType;

abstract class BarChart extends Chart
{
    protected function type(): ChartType
    {
        return new Bar();
    }
}
