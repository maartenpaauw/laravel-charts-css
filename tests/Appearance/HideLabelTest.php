<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\HideLabel;
use Maartenpaauw\Chart\Appearance\Modification;

class HideLabelTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new HideLabel();
    }

    public function classes(): array
    {
        return ['hide-label'];
    }
}
