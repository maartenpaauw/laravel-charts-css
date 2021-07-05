<?php

namespace Maartenpaauw\Chartscss\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;

class Inline implements Modification
{
    public function classes(): array
    {
        return ['legend-inline'];
    }
}
