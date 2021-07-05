<?php

namespace Maartenpaauw\Chartscss\Tests\Legend\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Legend\Appearance\Inline;
use Maartenpaauw\Chartscss\Tests\Appearance\ModificationTest;

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
