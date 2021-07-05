<?php

namespace Maartenpaauw\Chartscss\Tests\Types;

use Maartenpaauw\Chartscss\Types\Bar;
use Maartenpaauw\Chartscss\Types\ChartType;

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
