<?php

namespace Maartenpaauw\Chart\Configuration\Specifications\Dummy;

use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Configuration\Specifications\ConfigurationSpecification;

class PositiveSpecification implements ConfigurationSpecification
{
    public function isSatisfiedBy(ConfigurationContract $configuration): bool
    {
        return true;
    }
}
