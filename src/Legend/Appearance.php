<?php

namespace Maartenpaauw\Chart\Legend;

class Appearance
{
    private bool $inline;

    private string $shape;

    public function __construct(bool $inline = false, string $shape = Shape::NONE)
    {
        $this->inline = $inline;
        $this->shape = $shape;
    }

    public function classes(): array
    {
        $classes = [];

        if ($this->inline) {
            $classes[] = 'legend-inline';
        }

        if ($this->shape !== Shape::NONE) {
            $classes[] = 'legend-'.$this->shape;
        }

        return $classes;
    }
}
