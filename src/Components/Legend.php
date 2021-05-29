<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Legend\Legend as Configuration;

class Legend extends Component
{
    public Configuration $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function render(): View
    {
        return view('charts-css::components.legend');
    }
}
