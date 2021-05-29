<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\Multiple;

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
