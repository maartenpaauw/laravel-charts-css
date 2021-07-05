<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\ShowPrimaryAxis;

class ShowPrimaryAxisTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ShowPrimaryAxis();
    }

    public function classes(): array
    {
        return ['show-primary-axis'];
    }
}
