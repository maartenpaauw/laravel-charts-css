<?php

namespace Maartenpaauw\Chart\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;

class Circle implements Modification
{
    public function classes(): array
    {
        return ['legend-circle'];
    }
}
