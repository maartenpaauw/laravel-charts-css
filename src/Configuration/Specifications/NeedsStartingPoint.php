<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Types\Area;
use Maartenpaauw\Chartscss\Types\Line;
use Maartenpaauw\Specifications\CompositeSpecification;

/**
 * @extends CompositeSpecification<ConfigurationContract>
 */
class NeedsStartingPoint extends CompositeSpecification
{
    /**
     * @var string[]
     */
    private array $types;

    public function __construct()
    {
        $this->types = [
            (new Area())->toString(),
            (new Line())->toString(),
        ];
    }

    public function isSatisfiedBy($candidate): bool
    {
        return in_array(
            $candidate->identity()->type()->toString(),
            $this->types,
        );
    }
}
