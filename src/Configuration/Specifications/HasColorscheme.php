<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\Configuration;

class HasColorscheme implements ConfigurationSpecification
{
    public function isSatisfiedBy(Configuration $configuration): bool
    {
        return count($configuration->colorscheme()->colors()) !== 0;
    }
}
