<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ShowDataOnHover;

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
