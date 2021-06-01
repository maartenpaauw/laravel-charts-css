<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Data\DatasetsContract;

class Table extends Component
{
    public DatasetsContract $datasets;

    public ModificationsBag $modifications;

    public function __construct(DatasetsContract $datasets, ModificationsBag $modifications)
    {
        $this->datasets = $datasets;
        $this->modifications = $modifications;
    }

    public function render(): View
    {
        return view('charts-css::components.table');
    }
}
