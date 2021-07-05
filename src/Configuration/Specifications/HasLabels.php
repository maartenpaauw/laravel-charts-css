<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;

class HasLabels implements ConfigurationSpecification
{
    public function isSatisfiedBy(ConfigurationContract $configuration): bool
    {
        return count($configuration->legend()->labels()) !== 0;
    }
}
