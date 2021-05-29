<?php

namespace Maartenpaauw\Chart\Data;

class Datasets
{
    private array $datasets;

    public function __construct(array $datasets)
    {
        $this->datasets = $datasets;
    }

    public function size(): int
    {
        return count($this->datasets);
    }

    public function max(): float
    {
        return max(array_map(fn (Dataset $dataset) => $dataset->max(), $this->datasets));
    }

    public function toArray(): array
    {
        return $this->datasets;
    }
}
