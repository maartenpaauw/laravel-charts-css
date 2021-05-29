<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ShowHeading;

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
