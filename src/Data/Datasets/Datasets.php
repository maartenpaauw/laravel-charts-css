<?php

namespace Maartenpaauw\Chartscss\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\AxesContract;

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

    public function axes(): AxesContract
    {
        return $this->axes;
    }

    public function toArray(): array
    {
        return $this->datasets;
    }
}
