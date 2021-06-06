<?php

namespace Maartenpaauw\Chart\Types;

use Maartenpaauw\Chart\Appearance\CustomModification;
use Maartenpaauw\Chart\Appearance\Modification;

class Column implements ChartType
{
    public function toString(): string
    {
        return 'column';
    }

    public function toModification(): Modification
    {
        return new CustomModification($this->toString());
    }
}
