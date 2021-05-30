<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Data\Datasets;

class Table extends Component
{
    public Datasets $datasets;

    public ModificationsBag $modifications;

    public function __construct(Datasets $datasets, ModificationsBag $modifications)
    {
        $this->datasets = $datasets;
        $this->modifications = $modifications;
    }

    public function render(): View
    {
        return view('charts-css::components.table');
    }
}
