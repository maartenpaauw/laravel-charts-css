<?php

namespace Maartenpaauw\Chart\Tests\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Legend\Appearance\Square;
use Maartenpaauw\Chart\Tests\Appearance\ModificationTest;

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
