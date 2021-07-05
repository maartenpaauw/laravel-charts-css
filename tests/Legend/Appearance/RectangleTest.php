<?php

namespace Maartenpaauw\Chartscss\Tests\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Legend\Appearance\Rectangle;
use Maartenpaauw\Chartscss\Tests\Appearance\ModificationTest;

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
