<?php

namespace Maartenpaauw\Chartscss\Tests\Types;

use Maartenpaauw\Chartscss\Types\ChartType;
use Maartenpaauw\Chartscss\Types\Line;

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
