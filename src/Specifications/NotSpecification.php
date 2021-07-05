<?php

namespace Maartenpaauw\Chartscss\Specifications;

class NotSpecification implements BasicSpecification
{
    /**
     * @var mixed
     */
    private $specification;

    public function __construct($specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfiedBy($entity): bool
    {
        return ! $this->specification->isSatisfiedBy($entity);
    }
}
