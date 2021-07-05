<?php

namespace Maartenpaauw\Chartscss\Types;

use Maartenpaauw\Chartscss\Appearance\Modification;

interface ChartType
{
    public function toString(): string;

    public function toModification(): Modification;
}
