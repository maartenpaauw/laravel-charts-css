<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\CustomModification;
use Maartenpaauw\Chart\Appearance\Modification;

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
