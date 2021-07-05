<?php

namespace Maartenpaauw\Chartscss\Data\Entries\Tooltip;

class NullTooltip implements TooltipContract
{
    public function content(): string
    {
        return '';
    }
}
