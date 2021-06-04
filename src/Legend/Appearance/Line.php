<?php

namespace Maartenpaauw\Chart\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;

class Line implements Modification
{
    public function classes(): array
    {
        return ['legend-line'];
    }
}
