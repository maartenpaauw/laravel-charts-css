<?php

namespace Maartenpaauw\Chart\Data\Specifications;

use Maartenpaauw\Chart\Data\DatasetsContract;

interface DatasetsSpecification
{
    public function isSatisfiedBy(DatasetsContract $datasets): bool;
}
