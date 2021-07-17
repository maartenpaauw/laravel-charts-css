<?php

namespace Maartenpaauw\Chartscss\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Entries\EntryContract;
use Maartenpaauw\Chartscss\Data\Entries\StartingPointEntry;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;
use Maartenpaauw\Chartscss\Statistics\StatisticContract;

class StartingPointDataset implements DatasetContract
{
    private DatasetContract $origin;

    private StatisticContract $maximum;

    public function __construct(DatasetContract $origin, StatisticContract $maximum)
    {
        $this->origin = $origin;
        $this->maximum = $maximum;
    }

    public function entries(): array
    {
        if (count($this->origin->entries()) <= 1) {
            return $this->origin->entries();
        }

        $entries = array_values($this->origin->entries());
        $first = array_shift($entries);

        return array_merge([$first], array_map(function (EntryContract $entry, int $key) use ($first, $entries) {
            return new StartingPointEntry($entry, $entries[--$key] ?? $first, $this->maximum);
        }, $entries, array_keys($entries)));
    }

    public function label(): LabelContract
    {
        return $this->origin->label();
    }
}
