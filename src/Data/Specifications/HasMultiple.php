<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;

class HasMultiple implements DatasetsSpecification
{
    public function isSatisfiedBy(DatasetsContract $datasets): bool
    {
        return count($datasets->toArray()) > 1;
    }
}
