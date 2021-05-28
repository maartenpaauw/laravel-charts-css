<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Table extends Component
{
    public bool $heading;

    public function __construct(bool $heading = false)
    {
        $this->heading = $heading;
    }

    public function render(): View
    {
        return view('charts-css::components.table');
    }
}
