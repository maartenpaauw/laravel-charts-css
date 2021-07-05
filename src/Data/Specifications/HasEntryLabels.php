<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;

class HasEntryLabels implements DatasetsSpecification
{
    public function isSatisfiedBy(DatasetsContract $datasets): bool
    {
        foreach ($datasets->toArray() as $dataset) {
            foreach ($dataset->entries() as $entry) {
                if ($entry->label()->value() !== '') {
                    return true;
                }
            }
        }

        return false;
    }
}
