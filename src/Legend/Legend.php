<?php

namespace Maartenpaauw\Chart\Legend;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ModificationsBag;

class Legend
{
    private array $labels;

    /**
     * @param Modification[] $modifications
     */
    private array $modifications;

    /**
     * @param Modification[] $modifications
     */
    public function __construct(array $labels, array $modifications)
    {
        $this->labels = $labels;
        $this->modifications = $modifications;
    }

    public function labels(): array
    {
        return $this->labels;
    }

    public function classes(): array
    {
        return (new ModificationsBag(
            $this->modifications,
        ))->classes();
    }
}
