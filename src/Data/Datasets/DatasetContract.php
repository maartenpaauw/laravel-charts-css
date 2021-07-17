<?php

namespace Maartenpaauw\Chartscss\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Entries\EntryContract;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;

interface DatasetContract
{
    /**
     * @return EntryContract[]
     */
    public function entries(): array;

    public function label(): LabelContract;
}
