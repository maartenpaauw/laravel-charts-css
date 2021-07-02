<?php

namespace Maartenpaauw\Chart\Data\Entries\Tooltip;

class NullTooltip implements TooltipContract
{
    public function content(): string
    {
        return '';
    }
}
