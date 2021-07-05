<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\LabelsAlignCenter;
use Maartenpaauw\Chartscss\Appearance\Modification;

class LabelsAlignCenterTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new LabelsAlignCenter();
    }

    public function classes(): array
    {
        return ['labels-align-center'];
    }
}
