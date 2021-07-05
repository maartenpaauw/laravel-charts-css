<?php

namespace Maartenpaauw\Chartscss\Legend;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Legend\Appearance\Circle;
use Maartenpaauw\Chartscss\Legend\Appearance\Ellipse;
use Maartenpaauw\Chartscss\Legend\Appearance\Inline;
use Maartenpaauw\Chartscss\Legend\Appearance\Line;
use Maartenpaauw\Chartscss\Legend\Appearance\Rectangle;
use Maartenpaauw\Chartscss\Legend\Appearance\Rhombus;
use Maartenpaauw\Chartscss\Legend\Appearance\Square;

class Legend
{
    private array $labels;

    private Modifications $modifications;

    private string $tag;

    public function __construct(array $labels = [], ?Modifications $modifications = null, string $tag = 'ul')
    {
        $this->labels = $labels;
        $this->modifications = $modifications ?? new Modifications();
        $this->tag = $tag;
    }

    public function labels(): array
    {
        return $this->labels;
    }

    public function withLabel(string $label): self
    {
        return $this->withLabels([$label]);
    }

    public function withLabels(array $labels): Legend
    {
        return new self(
            array_merge($this->labels, $labels),
            $this->modifications,
            $this->tag,
        );
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
            ]));

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
            $this->modifications,
            'ol',
        );
    }

    public function tag(): string
    {
        return $this->tag;
    }
}
