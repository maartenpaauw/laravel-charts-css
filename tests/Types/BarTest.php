<?php

namespace Maartenpaauw\Chart\Tests\Types;

use Maartenpaauw\Chart\Types\Bar;
use Maartenpaauw\Chart\Types\ChartType;

class BarTest extends ChartTypeTest
{
    public function type(): ChartType
    {
        return new Bar();
    }

    public function string(): string
    {
        return 'bar';
    }
}
