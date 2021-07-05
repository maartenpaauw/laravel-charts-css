<?php

namespace Maartenpaauw\Chartscss\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;

class Square implements Modification
{
    public function classes(): array
    {
        return ['legend-square'];
    }
}
