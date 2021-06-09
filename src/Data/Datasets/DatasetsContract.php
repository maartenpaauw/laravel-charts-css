<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Axes\AxesContract;

interface DatasetsContract
{
    public function size(): int;

    public function max(): float;

    public function axes(): AxesContract;

    /**
     * @return DatasetContract[]
     */
    public function toArray(): array;
}