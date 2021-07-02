<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Data\Entries\Tooltip\NullTooltip;
use Maartenpaauw\Chart\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\LabelContract;

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
