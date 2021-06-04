<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\Configuration;

class HasLabels implements ConfigurationSpecification
{
    public function isSatisfiedBy(Configuration $configuration): bool
    {
        return count($configuration->legend()->labels()) !== 0;
    }
}
