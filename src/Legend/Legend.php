<?php

namespace Maartenpaauw\Chart\Legend;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Legend\Appearance\Inline;

class Legend
{
    private array $labels;

    private ModificationsBag $modificationsBag;

    /**
     * @param Modification[] $modifications
     */
    public function __construct(array $labels = [], array $modifications = [])
    {
        $this->labels = $labels;
        $this->modificationsBag = new ModificationsBag($modifications);
    }

    public function labels(): array
    {
        return $this->labels;
    }

    public function withLabel(string $label): Legend
    {
        $this->labels[] = $label;

        return $this;
    }

    public function withModification(Modification $modification): Legend
    {
        $this->modificationsBag->add($modification);

        return $this;
    }

    public function inline(): self
    {
        $this->modificationsBag->add(new Inline());

        return $this;
    }

    public function classes(): array
    {
        return $this->modificationsBag->classes();
    }
}
