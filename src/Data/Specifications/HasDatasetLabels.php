<?php

namespace Maartenpaauw\Chart\Data\Specifications;

use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;

class HasDatasetLabels implements DatasetsSpecification
{
    public function isSatisfiedBy(DatasetsContract $datasets): bool
    {
        foreach ($datasets->toArray() as $dataset) {
            if ($dataset->label()->value() !== '') {
                return true;
            }
        }

        return false;
    }
}
