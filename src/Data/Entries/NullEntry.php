<?php

namespace Maartenpaauw\Chartscss\Data\Entries;

use Maartenpaauw\Chartscss\Data\Entries\Tooltip\NullTooltip;
use Maartenpaauw\Chartscss\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chartscss\Data\Entries\Value\NullValue;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;
use Maartenpaauw\Chartscss\Data\Label\NullLabel;

class NullEntry implements EntryContract
{
    public function value(): ValueContract
    {
        return new NullValue();
    }

    public function label(): LabelContract
    {
        return new NullLabel();
    }

    public function tooltip(): TooltipContract
    {
        return new NullTooltip();
    }
}
