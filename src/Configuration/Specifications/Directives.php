<?php

namespace Maartenpaauw\Chart\Configuration\Specifications;

use Illuminate\Support\Facades\Blade;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;

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
