<?php

namespace Maartenpaauw\Chart\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;

class Inline implements Modification
{
    public function classes(): array
    {
        return ['legend-inline'];
    }
}
