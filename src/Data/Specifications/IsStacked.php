<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Datasets\PercentageStackedDatasets;
use Maartenpaauw\Chartscss\Data\Datasets\SimpleStackedDatasets;
use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<DatasetsContract>
 */
class IsStacked extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy($candidate): bool
    {
        return in_array(get_class($candidate), [
            SimpleStackedDatasets::class,
            PercentageStackedDatasets::class,
        ]);
    }
}
