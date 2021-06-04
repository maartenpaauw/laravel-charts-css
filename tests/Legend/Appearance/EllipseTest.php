<?php

namespace Maartenpaauw\Chart\Tests\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Legend\Appearance\Ellipse;
use Maartenpaauw\Chart\Tests\Appearance\ModificationTest;

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
