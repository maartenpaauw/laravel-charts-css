<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ShowPrimaryAxis;

class ShowPrimaryAxisTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ShowPrimaryAxis();
    }

    public function classes(): array
    {
        return ['show-primary-axis'];
    }
}
