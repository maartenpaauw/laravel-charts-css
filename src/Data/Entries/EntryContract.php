<?php

namespace Maartenpaauw\Chartscss\Data\Entries;

use Maartenpaauw\Chartscss\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;

interface EntryContract
{
    public function value(): ValueContract;

    public function label(): LabelContract;

    public function tooltip(): TooltipContract;
}
