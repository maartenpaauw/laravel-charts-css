<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Datasets\PercentageStackedDatasets;
use Maartenpaauw\Chartscss\Data\Datasets\SimpleStackedDatasets;

class IsStacked implements DatasetsSpecification
{
    public function isSatisfiedBy(DatasetsContract $datasets): bool
    {
        return in_array(get_class($datasets), [
            SimpleStackedDatasets::class,
            PercentageStackedDatasets::class,
        ]);
    }
}
