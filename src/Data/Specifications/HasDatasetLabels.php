<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<DatasetsContract>
 */
class HasDatasetLabels extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy($candidate): bool
    {
        foreach ($candidate->toArray() as $dataset) {
            if ($dataset->label()->value() !== '') {
                return true;
            }
        }

        return false;
    }
}
