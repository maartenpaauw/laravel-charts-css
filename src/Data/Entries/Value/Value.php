<?php

namespace Maartenpaauw\Chart\Data\Entries\Value;

use Maartenpaauw\Chart\Declarations\Declarations;

class Value implements ValueContract
{
    private float $raw;

    private string $display;

    private Declarations $declarations;

    public function __construct(float $raw, ?string $display = null, ?Declarations $declarations = null)
    {
        $this->raw = $raw;
        $this->display = $display ?? strval($raw);
        $this->declarations = $declarations ?? new Declarations();
    }

    public function raw(): float
    {
        return $this->raw;
    }

    public function display(): string
    {
        return $this->display;
    }

    public function declarations(): Declarations
    {
        return $this->declarations;
    }
}
