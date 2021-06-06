<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Types\Area;
use Maartenpaauw\Chart\Types\Line;

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
