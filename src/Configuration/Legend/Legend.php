<?php

namespace Maartenpaauw\Chart\Configuration\Legend;

class Legend
{
    public array $labels;

    public bool $inline;

    public string $shape;

    public function __construct(array $labels = [], bool $inline = false, string $shape = Shape::NONE)
    {
        $this->labels = $labels;
        $this->inline = $inline;
        $this->shape = $shape;
    }

    public function inline(): Legend
    {
        return new Legend(
            $this->labels,
            true,
            $this->shape,
        );
    }

    public function shape(string $shape): Legend
    {
        return new Legend(
            $this->labels,
            $this->inline,
            $shape,
        );
    }
}
