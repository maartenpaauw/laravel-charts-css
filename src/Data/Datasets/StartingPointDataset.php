<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Data\Entries\StartingPointEntry;
use Maartenpaauw\Chart\Data\Label\LabelContract;

class StartingPointDataset implements DatasetContract
{
    private DatasetContract $origin;

    private float $max;

    public function __construct(DatasetContract $origin, float $max)
    {
        $this->origin = $origin;
        $this->max = $max;
    }

    public function entries(): array
    {
        if (count($this->origin->entries()) <= 1) {
            return $this->origin->entries();
        }

        $entries = array_values($this->origin->entries());
        $first = array_shift($entries);

        return array_merge([$first], array_map(function (EntryContract $entry, int $key) use ($first, $entries) {
            return new StartingPointEntry($entry, $entries[--$key] ?? $first, $this->max);
        }, $entries, array_keys($entries)));
    }

    public function max(): float
    {
        return $this->origin->max();
    }

    public function label(): LabelContract
    {
        return $this->origin->label();
    }
}
