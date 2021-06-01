<?php

namespace Maartenpaauw\Chart\Data;

interface DatasetsContract
{
    public function size(): int;

    public function max(): float;

    /**
     * @return DatasetContract[]
     */
    public function toArray(): array;
}
