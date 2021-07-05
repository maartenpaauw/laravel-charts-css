<?php

namespace Maartenpaauw\Chartscss\Specifications;

interface BasicSpecification
{
    public function isSatisfiedBy($entity): bool;
}
