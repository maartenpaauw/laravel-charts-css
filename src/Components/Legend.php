<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Configuration\Configuration;

class Legend extends Component
{
    private Configuration $configuration;

    public function __construct(Configuration $configuration)
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
