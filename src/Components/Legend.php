<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;

class Legend extends Component
{
    private ConfigurationContract $configuration;

    public function __construct(ConfigurationContract $configuration)
    {
        $this->configuration = $configuration;
    }

    public function render(): View
    {
        return view('charts-css::components.legend', [
            'labels' => $this->configuration->legend()->labels(),
            'classes' => $this->configuration->legend()->classes(),
        ]);
    }
}
