<?php

namespace Maartenpaauw\Chartscss\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;

class Ellipse implements Modification
{
    public function classes(): array
    {
        return ['legend-ellipse'];
    }
}
