<?php

namespace Maartenpaauw\Chart\Types;

use Maartenpaauw\Chart\Appearance\CustomModification;
use Maartenpaauw\Chart\Appearance\Modification;

abstract class AbstractChartType implements ChartType
{
    public function toModification(): Modification
    {
        return new CustomModification($this->toString());
    }
}
