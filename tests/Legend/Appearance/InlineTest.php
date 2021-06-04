<?php

namespace Maartenpaauw\Chart\Tests\Legend\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Legend\Appearance\Inline;
use Maartenpaauw\Chart\Tests\Appearance\ModificationTest;

class InlineTest extends ModificationTest
{

    public function modification(): Modification
    {
        return new Inline();
    }

    public function classes(): array
    {
        return ['legend-inline'];
    }
}
