<?php

namespace Maartenpaauw\Chart\Configuration\Specifications\Dummy;

use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Configuration\Specifications\ConfigurationSpecification;

class NegativeSpecification implements ConfigurationSpecification
{
    public function isSatisfiedBy(ConfigurationContract $configuration): bool
    {
        return false;
    }
}
