<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Illuminate\Support\Facades\Blade;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Specifications\Specification;

class Directives
{
    /**
     * @param Specification<ConfigurationContract> $specification
     */
    public function register(Specification $specification, string $name): self
    {
        Blade::if($name, function (ConfigurationContract $configuration) use ($specification) {
            return $specification->isSatisfiedBy($configuration);
        });

        return $this;
    }
}
