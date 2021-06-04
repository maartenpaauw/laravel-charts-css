<?php

namespace Maartenpaauw\Chart\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;

class Rectangle implements Modification
{
    public function classes(): array
    {
        return ['legend-rectangle'];
    }
}
