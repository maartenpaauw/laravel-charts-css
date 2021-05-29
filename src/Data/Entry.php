<?php

namespace Maartenpaauw\Chart\Data;

class Entry
{
    private string $value;

    private float $raw;

    public function __construct(string $value, float $raw)
    {
        $this->value = $value;
        $this->raw = $raw;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function raw(): float
    {
        return $this->raw;
    }
}
