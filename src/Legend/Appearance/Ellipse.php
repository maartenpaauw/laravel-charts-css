<?php

namespace Maartenpaauw\Chart\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;

class Ellipse implements Modification
{
    public function classes(): array
    {
        return ['legend-ellipse'];
    }
}
