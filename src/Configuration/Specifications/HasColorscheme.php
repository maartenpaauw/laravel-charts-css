<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\ConfigurationContract;

class HasColorscheme implements ConfigurationSpecification
{
    public function isSatisfiedBy(ConfigurationContract $configuration): bool
    {
        return count($configuration->colorscheme()->colors()) !== 0;
    }
}
