<?php

namespace Maartenpaauw\Chartscss;

use Maartenpaauw\Chartscss\Types\ChartType;
use Maartenpaauw\Chartscss\Types\Line;

abstract class LineChart extends Chart
{
    protected function type(): ChartType
    {
        return new Line();
    }
}
