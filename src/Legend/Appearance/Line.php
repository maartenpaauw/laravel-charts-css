<?php

namespace Maartenpaauw\Chartscss\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;

class Line implements Modification
{
    public function classes(): array
    {
        return ['legend-line'];
    }
}
