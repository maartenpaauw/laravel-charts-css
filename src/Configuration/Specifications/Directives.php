<?php

namespace Maartenpaauw\Chartscss\Configuration\Specifications;

use Illuminate\Support\Facades\Blade;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;

class Directives
{
    public function register(ConfigurationSpecification $specification, string $name): self
    {
        Blade::if($name, function (ConfigurationContract $configuration) use ($specification) {
            return $specification->isSatisfiedBy($configuration);
        });

        return $this;
    }
}
