<?php

namespace Maartenpaauw\Chart\Tests\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Legend\Appearance\Line;
use Maartenpaauw\Chart\Tests\Appearance\ModificationTest;

class LineTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new Line();
    }

    public function classes(): array
    {
        return ['legend-line'];
    }
}
