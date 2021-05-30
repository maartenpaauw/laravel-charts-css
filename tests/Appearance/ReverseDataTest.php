<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ReverseData;

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
