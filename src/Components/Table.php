<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Data\Datasets;

class Table extends Component
{
    public Datasets $datasets;

    public bool $heading;

    public function __construct(Datasets $datasets, bool $heading = false)
    {
        $this->datasets = $datasets;
        $this->heading = $heading;
    }

    public function render(): View
    {
        return view('charts-css::components.table');
    }
}
