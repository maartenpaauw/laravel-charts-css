<?php

namespace Maartenpaauw\Chart\Tests\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Legend\Appearance\Rhombus;
use Maartenpaauw\Chart\Tests\Appearance\ModificationTest;

class RhombusTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new Rhombus();
    }

    public function classes(): array
    {
        return ['legend-rhombus'];
    }
}
