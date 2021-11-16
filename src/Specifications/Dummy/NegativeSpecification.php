<?php

namespace Maartenpaauw\Chartscss\Specifications\Dummy;

use Maartenpaauw\Chartscss\Specifications\BasicSpecification;

/**
 * @template T
 * @implements BasicSpecification<T>
 */
class NegativeSpecification implements BasicSpecification
{
    public function isSatisfiedBy($entity): bool
    {
        return false;
    }
}
