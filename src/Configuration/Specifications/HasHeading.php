<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\ConfigurationContract;

class HasHeading implements ConfigurationSpecification
{
    public function isSatisfiedBy(ConfigurationContract $configuration): bool
    {
        return $configuration->identity()->description() !== '';
    }
}
