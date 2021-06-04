<?php

namespace Maartenpaauw\Chart\Tests\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Legend\Appearance\Rectangle;
use Maartenpaauw\Chart\Tests\Appearance\ModificationTest;

class RectangleTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new Rectangle();
    }

    public function classes(): array
    {
        return ['legend-rectangle'];
    }
}
