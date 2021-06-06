<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Declarations\Declarations;

class Entry implements EntryContract
{
    private string $value;

    private float $raw;

    private Declarations $declarations;

    public function __construct(string $value, float $raw)
    {
        $this->value = $value;
        $this->raw = $raw;
        $this->declarations = new Declarations();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function raw(): float
    {
        return $this->raw;
    }

    public function start(): float
    {
        return $this->raw;
    }

    public function declarations(): Declarations
    {
        return $this->declarations;
    }

    public function color(ColorContract $color): self
    {
        $this->declarations()->add($color->declaration());

        return $this;
    }
}
