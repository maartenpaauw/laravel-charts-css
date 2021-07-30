<?php

namespace Maartenpaauw\Chartscss\Data\Datasets\Statistics;

use Maartenpaauw\Chartscss\Data\Dataset\Statistics\HighestEntryStatistic as HighestDatasetEntryStatistic;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetContract;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Statistics\StatisticContract;

class HighestEntryStatistic implements StatisticContract
{
    private DatasetsContract $datasets;

    public function __construct(DatasetsContract $datasets)
    {
        $this->datasets = $datasets;
    }

    public function result(): float
    {
        return max(
            array_merge(
                [0],
                array_map(
                    fn (DatasetContract $dataset) => (new HighestDatasetEntryStatistic($dataset))->result(),
                    $this->datasets->toArray(),
                ),
            ),
        );
    }
}
