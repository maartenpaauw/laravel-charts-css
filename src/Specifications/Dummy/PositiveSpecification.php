<?php

namespace Maartenpaauw\Chart\Specifications\Dummy;

use Maartenpaauw\Chart\Specifications\BasicSpecification;

class PositiveSpecification implements BasicSpecification
{
    public function isSatisfiedBy($entity): bool
    {
        return true;
    }
}
