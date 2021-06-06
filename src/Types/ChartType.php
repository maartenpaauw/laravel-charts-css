<?php

namespace Maartenpaauw\Chart\Types;

use Maartenpaauw\Chart\Appearance\Modification;

interface ChartType
{
    public function toString(): string;

    public function toModification(): Modification;
}
