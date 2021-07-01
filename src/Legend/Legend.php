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
        return $this->withModification(new Inline());
    }

    public function circles(): self
    {
        return $this->withModification(new Circle());
    }

    public function ellipses(): self
    {
        return $this->withModification(new Ellipse());
    }

    public function lines(): self
    {
        return $this->withModification(new Line());
    }

    public function rectangles(): self
    {
        return $this->withModification(new Rectangle());
    }

    public function rhombuses(): self
    {
        return $this->withModification(new Rhombus());
    }

    public function squares(): self
    {
        return $this->withModification(new Square());
    }

    private function withModification(Modification $modification): Legend
    {
        $mergedModifications = $this->modifications
            ->merge(new Modifications([
                $modification,
            ]))
            ->toArray();

        return new self(
            $this->labels,
            $mergedModifications,
            $this->tag,
        );
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
