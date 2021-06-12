<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\Entry;

class Dataset implements DatasetContract
{
    private array $entries;

    private string $label;

    public function __construct(array $entries, string $label = '')
    {
        $this->entries = $entries;
        $this->label = $label;
    }

    public function entries(): array
    {
        return $this->entries;
    }

    public function label(): string
    {
        return $this->label;
    }

    public function max(): float
    {
        return max(array_map(fn (Entry $entry) => $entry->raw(), $this->entries));
    }
}
