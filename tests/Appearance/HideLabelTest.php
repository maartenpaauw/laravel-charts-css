<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\HideLabel;
use Maartenpaauw\Chartscss\Appearance\Modification;

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
