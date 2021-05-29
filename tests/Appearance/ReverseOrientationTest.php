<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ReverseOrientation;

class ReverseOrientationTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ReverseOrientation();
    }

    public function classes(): array
    {
        return ['reverse'];
    }
}
