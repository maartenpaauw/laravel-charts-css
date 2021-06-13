<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\ConfigurationContract;

class NotSpecification implements ConfigurationSpecification
{
    private ConfigurationSpecification $specification;

    public function __construct(ConfigurationSpecification $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfiedBy(ConfigurationContract $configuration): bool
    {
        return ! $this->specification->isSatisfiedBy($configuration);
    }
}
