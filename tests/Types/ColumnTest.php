<?php

namespace Maartenpaauw\Chartscss\Tests\Types;

use Maartenpaauw\Chartscss\Types\ChartType;
use Maartenpaauw\Chartscss\Types\Column;

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
