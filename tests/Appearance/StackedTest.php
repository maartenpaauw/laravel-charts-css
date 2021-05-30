<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\Stacked;

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
