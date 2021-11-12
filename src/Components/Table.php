<?php

namespace Maartenpaauw\Chartscss\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;

class Table extends Component
{
    private DatasetsContract $datasets;

    private ConfigurationContract $configuration;

    public function __construct(DatasetsContract $datasets, ConfigurationContract $configuration)
    {
        $this->datasets = $datasets;
        $this->configuration = $configuration;
    }

    public function render(): View
    {
        return view('charts-css::components.table', [
            'datasets' => $this->datasets,
            'configuration' => $this->configuration,
        ]);
    }
}
