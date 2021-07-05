<?php

namespace Maartenpaauw\Chartscss\Components;

use Illuminate\View\Component;

class Heading extends Component
{
    private string $heading;

    public function __construct(string $heading)
    {
        $this->heading = $heading;
    }

    public function render(): string
    {
        return "<caption>{$this->heading}</caption>";
    }
}
