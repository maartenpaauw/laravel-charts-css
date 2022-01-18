<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<ConfigurationContract>
 */
class HasHeading extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy($candidate): bool
    {
        return $candidate->identity()->description() !== '';
    }
}
