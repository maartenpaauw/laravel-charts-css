<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ShowLabels;

class ShowLabelsTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ShowLabels();
    }

    public function classes(): array
    {
        return ['show-labels'];
    }
}