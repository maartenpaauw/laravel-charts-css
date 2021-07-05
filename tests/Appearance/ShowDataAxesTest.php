<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\ShowDataAxes;

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
