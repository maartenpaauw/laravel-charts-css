<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\ShowDataOnHover;

class ShowDataOnHoverTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ShowDataOnHover();
    }

    public function classes(): array
    {
        return ['show-data-on-hover'];
    }
}
