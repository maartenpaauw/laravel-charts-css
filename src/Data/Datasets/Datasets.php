<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Axes\AxesContract;

class Datasets implements DatasetsContract
{
    private AxesContract $axes;

    /**
     * @var DatasetContract[]
     */
    private array $datasets;

    public function __construct(AxesContract $axes, DatasetContract ...$datasets)
    {
        $this->axes = $axes;
        $this->datasets = $datasets;
    }

    public function size(): int
    {
        return count($this->datasets);
    }

    public function max(): float
    {
        return max(array_map(fn (Dataset $dataset) => $dataset->max(), $this->datasets));
    }

    public function axes(): AxesContract
    {
        return $this->axes;
    }

    public function toArray(): array
    {
        return $this->datasets;
    }
}
