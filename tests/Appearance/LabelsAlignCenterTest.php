<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\LabelsAlignCenter;
use Maartenpaauw\Chart\Appearance\Modification;

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
