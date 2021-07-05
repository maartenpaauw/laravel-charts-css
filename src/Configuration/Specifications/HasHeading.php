<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;

class HasHeading implements ConfigurationSpecification
{
    public function isSatisfiedBy(ConfigurationContract $configuration): bool
    {
        return $configuration->identity()->description() !== '';
    }
}
