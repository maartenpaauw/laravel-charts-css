<?php

namespace Maartenpaauw\Chart\Tests\Types;

use Maartenpaauw\Chart\Types\ChartType;
use Maartenpaauw\Chart\Types\Column;

class ColumnTest extends ChartTypeTest
{
    public function type(): ChartType
    {
        return new Column();
    }

    public function string(): string
    {
        return 'column';
    }
}
