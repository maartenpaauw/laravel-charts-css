<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\ConfigurationContract;

interface ConfigurationSpecification
{
    public function isSatisfiedBy(ConfigurationContract $configuration): bool;
}
