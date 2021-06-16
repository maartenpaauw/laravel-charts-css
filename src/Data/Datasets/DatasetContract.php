<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Data\Entries\Label\LabelContract;

interface DatasetContract
{
    /**
     * @return EntryContract[]
     */
    public function entries(): array;

    public function max(): float;

    public function label(): LabelContract;

    public function hideLabel(): DatasetContract;
}
