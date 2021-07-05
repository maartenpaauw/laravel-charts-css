<?php

namespace Maartenpaauw\Chartscss\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;

class Circle implements Modification
{
    public function classes(): array
    {
        return ['legend-circle'];
    }
}
