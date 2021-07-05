<?php

namespace Maartenpaauw\Chartscss\Tests\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Legend\Appearance\Rhombus;
use Maartenpaauw\Chartscss\Tests\Appearance\ModificationTest;

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
