<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\Modification;

class HideDataTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new HideData();
    }

    public function classes(): array
    {
        return ['hide-data'];
    }
}
