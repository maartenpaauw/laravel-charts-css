<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\ReverseOrientation;

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
