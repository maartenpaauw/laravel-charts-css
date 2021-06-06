<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\EntryContract;

interface DatasetContract
{
    /**
     * @return EntryContract[]
     */
    public function entries(): array;

    public function label(): string;

    public function max(): float;
}
