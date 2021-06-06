<?php

namespace Maartenpaauw\Chart\Data\Specifications;

use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;

class HasMultiple implements DatasetsSpecification
{
    public function isSatisfiedBy(DatasetsContract $datasets): bool
    {
        return $datasets->size() > 1;
    }
}
