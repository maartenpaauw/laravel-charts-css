<?php

namespace Maartenpaauw\Chartscss\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\AxesContract;
use Maartenpaauw\Chartscss\Data\Datasets\Statistics\HighestDatasetSumStatistic;

class SimpleStackedDatasets implements DatasetsContract
{
    private DatasetsContract $origin;

    public function __construct(DatasetsContract $origin)
    {
        $this->origin = $origin;
    }

    public function axes(): AxesContract
    {
        return $this->origin->axes();
    }

    public function toArray(): array
    {
        return array_map(function (DatasetContract $dataset) {
            return new CalculatedDataset($dataset, new HighestDatasetSumStatistic($this->origin));
        }, $this->origin->toArray());
    }
}
