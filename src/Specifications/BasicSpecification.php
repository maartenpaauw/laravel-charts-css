<?php

namespace Maartenpaauw\Chart\Specifications;

interface BasicSpecification
{
    public function isSatisfiedBy($entity): bool;
}
