<?php

namespace Maartenpaauw\Chart\Legend;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\Modifications;
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

    private Modifications $modifications;

    private string $tag;

    /**
     * @param Modification[] $modifications
     */
    public function __construct(array $labels = [], array $modifications = [], string $tag = 'ul')
    {
        $this->labels = $labels;
        $this->modifications = new Modifications($modifications);
        $this->tag = $tag;
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
        $this->modifications->add(new Inline());

        return $this;
    }

    public function circles(): self
    {
        $this->modifications->add(new Circle());

        return $this;
    }

    public function ellipses(): self
    {
        $this->modifications->add(new Ellipse());

        return $this;
    }

    public function lines(): self
    {
        $this->modifications->add(new Line());

        return $this;
    }

    public function rectangles(): self
    {
        $this->modifications->add(new Rectangle());

        return $this;
    }

    public function rhombuses(): self
    {
        $this->modifications->add(new Rhombus());

        return $this;
    }

    public function squares(): self
    {
        $this->modifications->add(new Square());

        return $this;
    }

    public function classes(): array
    {
        return $this->modifications->classes();
    }

    public function ordered(): Legend
    {
        return new Legend(
            $this->labels,
            $this->modifications->toArray(),
            'ol',
        );
    }

    public function tag(): string
    {
        return $this->tag;
    }
}
