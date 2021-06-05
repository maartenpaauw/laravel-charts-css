<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\ConfigurationContract;

class HasLabels implements ConfigurationSpecification
{
    public function isSatisfiedBy(ConfigurationContract $configuration): bool
    {
        return count($configuration->legend()->labels()) !== 0;
    }
}
