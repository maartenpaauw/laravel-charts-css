<?php

namespace Maartenpaauw\Chartscss\Tests\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Legend\Appearance\Line;
use Maartenpaauw\Chartscss\Tests\Appearance\ModificationTest;

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
