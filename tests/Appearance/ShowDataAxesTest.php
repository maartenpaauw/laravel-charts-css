<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ShowDataAxes;

class ShowDataAxesTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ShowDataAxes();
    }

    public function classes(): array
    {
        return ['show-data-axes'];
    }
}
