<?php

namespace Maartenpaauw\Chartscss\Specifications;

/**
 * @template T
 */
interface BasicSpecification
{
    /**
     * @param T $entity
     */
    public function isSatisfiedBy($entity): bool;
}
