<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\Configuration;

class HasHeading implements ConfigurationSpecification
{
    public function isSatisfiedBy(Configuration $configuration): bool
    {
        return $configuration->identity()->description() !== '';
    }
}
