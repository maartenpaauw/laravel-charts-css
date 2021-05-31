<?php

namespace Maartenpaauw\Chart\Data;

class Entry implements EntryContract
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

    public function start(): float
    {
        return $this->raw;
    }
}
