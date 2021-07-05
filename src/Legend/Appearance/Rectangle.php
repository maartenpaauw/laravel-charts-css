<?php

namespace Maartenpaauw\Chartscss\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;

class Rectangle implements Modification
{
    public function classes(): array
    {
        return ['legend-rectangle'];
    }
}
