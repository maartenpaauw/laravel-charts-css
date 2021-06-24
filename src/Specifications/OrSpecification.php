<?php

namespace Maartenpaauw\Chart\Specifications;

class OrSpecification implements BasicSpecification
{
    private array $specifications;

    public function __construct(...$specifications)
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
