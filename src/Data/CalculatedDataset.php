<?php

namespace Maartenpaauw\Chart\Data;

class CalculatedDataset implements DatasetContract
{
    private DatasetContract $origin;

    private float $max;

    public function __construct(DatasetContract $origin)
    {
        $this->origin = $origin;
        $this->max = $origin->max();
    }

    public function entries(): array
    {
        return $this->origin->entries();
    }

    public function label(): string
    {
        return $this->origin->label();
    }

    public function max(): float
    {
        return $this->max;
    }
}
