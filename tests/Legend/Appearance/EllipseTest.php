<?php

namespace Maartenpaauw\Chartscss\Tests\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Legend\Appearance\Ellipse;
use Maartenpaauw\Chartscss\Tests\Appearance\ModificationTest;

class EllipseTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new Ellipse();
    }

    public function classes(): array
    {
        return ['legend-ellipse'];
    }
}
