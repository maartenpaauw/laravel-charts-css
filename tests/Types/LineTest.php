<?php

namespace Maartenpaauw\Chart\Tests\Types;

use Maartenpaauw\Chart\Types\ChartType;
use Maartenpaauw\Chart\Types\Line;

class LineTest extends ChartTypeTest
{
    public function type(): ChartType
    {
        return new Line();
    }

    public function string(): string
    {
        return 'line';
    }
}
