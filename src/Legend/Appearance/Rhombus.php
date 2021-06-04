<?php

namespace Maartenpaauw\Chart\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;

class Rhombus implements Modification
{
    public function classes(): array
    {
        return ['legend-rhombus'];
    }
}
