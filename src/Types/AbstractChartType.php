<?php

namespace Maartenpaauw\Chartscss\Types;

use Maartenpaauw\Chartscss\Appearance\CustomModification;
use Maartenpaauw\Chartscss\Appearance\Modification;

abstract class AbstractChartType implements ChartType
{
    public function toModification(): Modification
    {
        return new CustomModification($this->toString());
    }
}
