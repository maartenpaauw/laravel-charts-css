<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\ReverseData;

class ReverseDataTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ReverseData();
    }

    public function classes(): array
    {
        return ['reverse-data'];
    }
}
