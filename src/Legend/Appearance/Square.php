<?php

namespace Maartenpaauw\Chart\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;

class Square implements Modification
{
    public function classes(): array
    {
        return ['legend-square'];
    }
}
