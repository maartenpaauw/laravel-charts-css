<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\CalculatedEntry;
use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Data\Label\LabelContract;

class CalculatedDataset implements DatasetContract
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
        return array_map(function (EntryContract $entry) {
            return new CalculatedEntry($entry, $this->max);
        }, $this->origin->entries());
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
