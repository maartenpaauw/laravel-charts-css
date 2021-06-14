<?php

namespace Maartenpaauw\Chart\Legend;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Legend\Appearance\Circle;
use Maartenpaauw\Chart\Legend\Appearance\Ellipse;
use Maartenpaauw\Chart\Legend\Appearance\Inline;
use Maartenpaauw\Chart\Legend\Appearance\Line;
use Maartenpaauw\Chart\Legend\Appearance\Rectangle;
use Maartenpaauw\Chart\Legend\Appearance\Rhombus;
use Maartenpaauw\Chart\Legend\Appearance\Square;

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

    public function withLabel(string $label): self
    {
        $this->labels[] = $label;

        return $this;
    }

    public function withLabels(array $labels): Legend
    {
        foreach ($labels as $label) {
            $this->withLabel($label);
        }

        return $this;
    }

    public function inline(): self
    {
        $this->modificationsBag->add(new Inline());

        return $this;
    }

    public function circles(): self
    {
        $this->modificationsBag->add(new Circle());

        return $this;
    }

    public function ellipses(): self
    {
        $this->modificationsBag->add(new Ellipse());

        return $this;
    }

    public function lines(): self
    {
        $this->modificationsBag->add(new Line());

        return $this;
    }

    public function rectangles(): self
    {
        $this->modificationsBag->add(new Rectangle());

        return $this;
    }

    public function rhombuses(): self
    {
        $this->modificationsBag->add(new Rhombus());

        return $this;
    }

    public function squares(): self
    {
        $this->modificationsBag->add(new Square());

        return $this;
    }

    public function classes(): array
    {
        return $this->modificationsBag->classes();
    }
}
