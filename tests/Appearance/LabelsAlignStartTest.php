<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\LabelsAlignStart;
use Maartenpaauw\Chartscss\Appearance\Modification;

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
