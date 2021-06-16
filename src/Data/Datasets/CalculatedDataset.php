<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\Label\LabelContract;

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

    public function max(): float
    {
        return $this->max;
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
