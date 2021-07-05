<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\ReverseDatasets;

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
