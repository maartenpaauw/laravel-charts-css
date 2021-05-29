<?php

namespace Maartenpaauw\Chart\Data;

class Dataset implements DatasetContract
{
    private array $entries;

    public function __construct(array $entries)
    {
        $this->entries = $entries;
    }

    public function entries(): array
    {
        return $this->entries;
    }

    public function max(): float
    {
        return max(array_map(fn (Entry $entry) => $entry->raw(), $this->entries));
    }
}
