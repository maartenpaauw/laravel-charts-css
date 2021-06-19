<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;

class Table extends Component
{
    public DatasetsContract $datasets;

    public ConfigurationContract $configuration;

    public function __construct(DatasetsContract $datasets, ConfigurationContract $configuration)
    {
        $this->datasets = $datasets;
        $this->configuration = $configuration;
    }

    public function render(): View
    {
        return view('charts-css::components.table', [
            'hasHeading' => (new HasHeading())->isSatisfiedBy($this->configuration),
        ]);
    }
}
