<?php

namespace Maartenpaauw\Chart\Tests\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Legend\Appearance\Circle;
use Maartenpaauw\Chart\Tests\Appearance\ModificationTest;

class CircleTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new Circle();
    }

    public function classes(): array
    {
        return ['legend-circle'];
    }
}
