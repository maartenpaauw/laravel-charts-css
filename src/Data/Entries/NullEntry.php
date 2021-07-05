<?php

namespace Maartenpaauw\Chartscss\Data\Entries;

use Maartenpaauw\Chartscss\Data\Entries\Tooltip\NullTooltip;
use Maartenpaauw\Chartscss\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;

class NullEntry implements EntryContract
{
    public function value(): ValueContract
    {
        return new Value(0, '-');
    }

    public function label(): LabelContract
    {
        return new Label('-');
    }

    public function tooltip(): TooltipContract
    {
        return new NullTooltip();
    }
}
