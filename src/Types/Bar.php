<?php

namespace Maartenpaauw\Chart\Types;

use Maartenpaauw\Chart\Appearance\CustomModification;
use Maartenpaauw\Chart\Appearance\Modification;

class Bar implements ChartType
{
    public function toString(): string
    {
        return 'bar';
    }

    public function toModification(): Modification
    {
        return new CustomModification($this->toString());
    }
}
