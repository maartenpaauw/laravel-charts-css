<?php

namespace Maartenpaauw\Chartscss\Tests\Types;

use Maartenpaauw\Chartscss\Types\Area;
use Maartenpaauw\Chartscss\Types\ChartType;

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
