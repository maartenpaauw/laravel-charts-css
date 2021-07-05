<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;

interface ConfigurationSpecification
{
    public function isSatisfiedBy(ConfigurationContract $configuration): bool;
}
