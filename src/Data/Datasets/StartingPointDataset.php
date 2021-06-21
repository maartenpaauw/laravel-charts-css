<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Data\Entries\NullEntry;
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
        $entries = array_values($this->origin->entries());

        return array_map(function (EntryContract $entry, int $key) use ($entries) {
            return new StartingPointEntry($entry, $entries[--$key] ?? new NullEntry(), $this->max);
        }, $entries, array_keys($entries));
    }

    public function max(): float
    {
        return $this->origin->max();
    }

    public function label(): LabelContract
    {
        return $this->origin->label();
    }

    public function hideLabel(): DatasetContract
    {
        $this->origin->hideLabel();

        return $this;
    }
}
