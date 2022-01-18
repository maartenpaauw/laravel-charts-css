<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<DatasetsContract>
 */
class HasMultiple extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy($candidate): bool
    {
        return count($candidate->toArray()) > 1;
    }
}
