<?php

namespace Maartenpaauw\Chartscss\Specifications;

/**
 * @template TEntity
 * @template TSpecification
 * @implements BasicSpecification<TEntity>
 */
class NotSpecification implements BasicSpecification
{
    /**
     * @var TSpecification
     */
    private $specification;

    /**
     * @param TSpecification $specification
     */
    public function __construct($specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfiedBy($entity): bool
    {
        return ! $this->specification->isSatisfiedBy($entity);
    }
}
