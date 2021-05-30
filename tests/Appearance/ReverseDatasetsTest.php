<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ReverseDatasets;

class ReverseDatasetsTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ReverseDatasets();
    }

    public function classes(): array
    {
        return ['reverse-datasets'];
    }
}
