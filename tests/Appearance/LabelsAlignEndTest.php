<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\LabelsAlignEnd;
use Maartenpaauw\Chartscss\Appearance\Modification;

class LabelsAlignEndTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new LabelsAlignEnd();
    }

    public function classes(): array
    {
        return ['labels-align-end'];
    }
}
