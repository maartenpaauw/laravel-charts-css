<?php

namespace Maartenpaauw\Chartscss\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;

interface DatasetsSpecification
{
    public function isSatisfiedBy(DatasetsContract $datasets): bool;
}
