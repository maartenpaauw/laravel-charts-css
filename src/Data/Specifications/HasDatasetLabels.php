<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;

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
