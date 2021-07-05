<?php

namespace Maartenpaauw\Chartscss\Tests\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Legend\Appearance\Square;
use Maartenpaauw\Chartscss\Tests\Appearance\ModificationTest;

class SquareTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new Square();
    }

    public function classes(): array
    {
        return ['legend-square'];
    }
}
