<?php

namespace Maartenpaauw\Chart\Specifications\Dummy;

use Maartenpaauw\Chart\Specifications\BasicSpecification;

class NegativeSpecification implements BasicSpecification
{
    public function isSatisfiedBy($entity): bool
    {
        return false;
    }
}
