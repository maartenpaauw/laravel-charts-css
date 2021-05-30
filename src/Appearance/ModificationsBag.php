<?php

namespace Maartenpaauw\Chart\Appearance;

class ModificationsBag implements Modification
{
    private array $modifications;

    public function __construct(array $modifications = [])
    {
        $this->modifications = $modifications;
    }

    public function modifications(): array
    {
        return $this->modifications;
    }

    public function add(Modification $modification): self
    {
        $this->modifications[] = $modification;

        return $this;
    }

    public function merge(ModificationsBag $modificationsBag): ModificationsBag
    {
        $merge = array_merge($this->modifications, $modificationsBag->modifications());

        return new ModificationsBag($merge);
    }

    public function classes(): array
    {
        return array_reduce($this->modifications, function (array $classes, Modification $modification) {
            return array_merge($classes, $modification->classes());
        }, []);
    }
}
