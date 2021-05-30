<?php

namespace Maartenpaauw\Chart\Data\Specifications;

use Maartenpaauw\Chart\Data\Datasets;

interface DatasetsSpecification
{
    public function isSatisfiedBy(Datasets $datasets): bool;
}
