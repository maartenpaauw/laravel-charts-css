<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\LabelsAlignStart;
use Maartenpaauw\Chart\Appearance\Modification;

class LabelsAlignStartTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new LabelsAlignStart();
    }

    public function classes(): array
    {
        return ['labels-align-start'];
    }
}
