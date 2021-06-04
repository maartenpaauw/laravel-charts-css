<?php

namespace Maartenpaauw\Chart\Appearance\Colorscheme;

class Color implements ColorContract
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function declaration(): string
    {
        return sprintf('--color: %s;', $this->value());
    }
}
