<?php

namespace Maartenpaauw\Chart\Tests\Types;

use Maartenpaauw\Chart\Types\Area;
use Maartenpaauw\Chart\Types\ChartType;

class AreaTest extends ChartTypeTest
{
    public function type(): ChartType
    {
        return new Area();
    }

    public function string(): string
    {
        return 'area';
    }
}
