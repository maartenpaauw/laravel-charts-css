<?php

namespace Maartenpaauw\Chartscss\Data\Dataset\Statistics;

use Maartenpaauw\Chartscss\Data\Datasets\DatasetContract;
use Maartenpaauw\Chartscss\Data\Entries\EntryContract;
use Maartenpaauw\Chartscss\Statistics\StatisticContract;

class SumStatistic implements StatisticContract
{
    private DatasetContract $dataset;

    public function __construct(DatasetContract $dataset)
    {
        $this->dataset = $dataset;
    }

    public function result(): float
    {
        return array_sum(
            array_map(
                fn (EntryContract $entry) => $entry->value()->raw(),
                $this->dataset->entries(),
            ),
        );
    }
}
