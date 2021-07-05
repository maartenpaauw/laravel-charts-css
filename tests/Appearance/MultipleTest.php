<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\Multiple;

class MultipleTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new Multiple();
    }

    public function classes(): array
    {
        return ['multiple'];
    }
}
