<?php

namespace Maartenpaauw\Chart\Appearance\Colorscheme;

class SpecificColor implements ColorContract
{
    private ColorContract $origin;

    private int $row;

    public function __construct(ColorContract $origin, int $row)
    {
        $this->origin = $origin;
        $this->row = $row;
    }

    public function value(): string
    {
        return $this->origin->value();
    }

    public function declaration(): string
    {
        return sprintf('--color-%d: %s', $this->row, $this->value());
    }
}
