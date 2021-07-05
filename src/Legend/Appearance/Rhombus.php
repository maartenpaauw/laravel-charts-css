<?php

namespace Maartenpaauw\Chartscss\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;

class Rhombus implements Modification
{
    public function classes(): array
    {
        return ['legend-rhombus'];
    }
}
