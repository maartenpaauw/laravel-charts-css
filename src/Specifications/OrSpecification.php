<?php

namespace Maartenpaauw\Chartscss\Specifications;

/**
 * @template TEntity
 * @template TSpecification
 * @implements BasicSpecification<TEntity>
 */
class OrSpecification implements BasicSpecification
{
    /**
     * @var TSpecification[]
     */
    private array $specifications;

    /**
     * @param array<TSpecification> $specifications
     */
    public function __construct(array $specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy($entity): bool
    {
        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($entity)) {
                return true;
            }
        }

        return false;
    }
}
