<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\CustomModification;
use Maartenpaauw\Chartscss\Appearance\Modification;

class CustomModificationTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new CustomModification('column');
    }

    public function classes(): array
    {
        return ['column'];
    }
}
