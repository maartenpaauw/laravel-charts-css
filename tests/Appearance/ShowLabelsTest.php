<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;

class ShowLabelsTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ShowLabels();
    }

    public function classes(): array
    {
        return ['show-labels'];
    }
}
