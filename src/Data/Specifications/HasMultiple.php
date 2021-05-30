<?php

namespace Maartenpaauw\Chart\Data\Specifications;

use Maartenpaauw\Chart\Data\Datasets;

class HasMultiple implements DatasetsSpecification
{
    public function isSatisfiedBy(Datasets $datasets): bool
    {
        return $datasets->size() > 1;
    }
}
