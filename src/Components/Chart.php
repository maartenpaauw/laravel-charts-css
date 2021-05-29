<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Data\Datasets;

class Chart extends Component
{
    public Datasets $datasets;

    public Configuration $configuration;

    public function __construct(Datasets $datasets, Configuration $configuration)
    {
        $this->datasets = $datasets;
        $this->configuration = $configuration;
    }

    public function render(): View
    {
        return view('charts-css::components.chart');
    }
}
