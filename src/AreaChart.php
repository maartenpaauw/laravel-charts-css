<?php

namespace Maartenpaauw\Chartscss;

use Maartenpaauw\Chartscss\Types\Area;
use Maartenpaauw\Chartscss\Types\ChartType;

abstract class AreaChart extends Chart
{
    protected function type(): ChartType
    {
        return new Area();
    }
}
