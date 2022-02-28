<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<ConfigurationContract>
 */
class HasLabels extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy($candidate): bool
    {
        return count($candidate->legend()->labels()) !== 0;
    }
}
