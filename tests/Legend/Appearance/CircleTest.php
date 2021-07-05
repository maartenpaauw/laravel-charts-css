<?php

namespace Maartenpaauw\Chartscss\Tests\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Legend\Appearance\Circle;
use Maartenpaauw\Chartscss\Tests\Appearance\ModificationTest;

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
