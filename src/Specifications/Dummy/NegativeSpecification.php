<?php

namespace Maartenpaauw\Chartscss\Specifications\Dummy;

use Maartenpaauw\Chartscss\Specifications\BasicSpecification;

class NegativeSpecification implements BasicSpecification
{
    public function isSatisfiedBy($entity): bool
    {
        return false;
    }
}
