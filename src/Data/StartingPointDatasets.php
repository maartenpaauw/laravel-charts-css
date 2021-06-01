<?php

namespace Maartenpaauw\Chart\Data;

class StartingPointDatasets implements DatasetsContract
{
    private DatasetsContract $origin;

    public function __construct(DatasetsContract $origin)
    {
        $this->origin = $origin;
    }

    public function size(): int
    {
        return $this->origin->size();
    }

    public function max(): float
    {
        return $this->origin->max();
    }

    public function toArray(): array
    {
        return array_map(function (DatasetContract $dataset) {
            return new StartingPointDataset($dataset);
        }, $this->origin->toArray());
    }
}
