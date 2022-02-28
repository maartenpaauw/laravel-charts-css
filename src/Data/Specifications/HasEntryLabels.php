<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<DatasetsContract>
 */
class HasEntryLabels extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy($candidate): bool
    {
        foreach ($candidate->toArray() as $dataset) {
            foreach ($dataset->entries() as $entry) {
                if ($entry->label()->value() !== '') {
                    return true;
                }
            }
        }

        return false;
    }
}
