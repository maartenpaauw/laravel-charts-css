<?php

namespace Maartenpaauw\Chart\Data\Entries\Tooltip;

class Tooltip implements TooltipContract
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function content(): string
    {
        return $this->content;
    }
}
