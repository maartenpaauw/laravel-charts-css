<?php

namespace Maartenpaauw\Chartscss\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Entries\CalculatedEntry;
use Maartenpaauw\Chartscss\Data\Entries\EntryContract;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;
use Maartenpaauw\Chartscss\Statistics\StatisticContract;

class CalculatedDataset implements DatasetContract
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
        return array_map(function (EntryContract $entry) {
            return new CalculatedEntry($entry, $this->maximum);
        }, $this->origin->entries());
    }

    public function label(): LabelContract
    {
        return $this->origin->label();
    }
}
