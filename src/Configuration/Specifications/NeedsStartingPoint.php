<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Types\Area;
use Maartenpaauw\Chartscss\Types\Line;

class NeedsStartingPoint implements ConfigurationSpecification
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

    public function isSatisfiedBy(ConfigurationContract $configuration): bool
    {
        return in_array($configuration->identity()->type()->toString(), $this->types);
    }
}
