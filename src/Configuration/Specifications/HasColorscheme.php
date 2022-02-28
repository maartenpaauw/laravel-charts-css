<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<ConfigurationContract>
 */
class HasColorscheme extends CompositeSpecification
{
    /**
     * @inheritDoc
     */
    public function isSatisfiedBy($candidate): bool
    {
        return count($candidate->colorscheme()->colors()) !== 0;
    }
}
