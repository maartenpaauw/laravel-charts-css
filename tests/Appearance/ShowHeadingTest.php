<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\ShowHeading;

class ShowHeadingTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ShowHeading();
    }

    public function classes(): array
    {
        return ['show-heading'];
    }
}
