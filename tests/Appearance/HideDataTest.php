<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modification;

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
