<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\Stacked;

class StackedTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new Stacked();
    }

    public function classes(): array
    {
        return ['stacked'];
    }
}
