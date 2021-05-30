<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\Configuration;

interface ConfigurationSpecification
{
    public function isSatisfiedBy(Configuration $configuration): bool;
}
