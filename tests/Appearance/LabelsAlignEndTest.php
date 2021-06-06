<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\LabelsAlignEnd;
use Maartenpaauw\Chart\Appearance\Modification;

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
