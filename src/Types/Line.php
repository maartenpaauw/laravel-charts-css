<?php

namespace Maartenpaauw\Chart\Types;

use Maartenpaauw\Chart\Appearance\CustomModification;
use Maartenpaauw\Chart\Appearance\Modification;

class Line implements ChartType
{
    public function toString(): string
    {
        return 'line';
    }

    public function toModification(): Modification
    {
        return new CustomModification($this->toString());
    }
}
