<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Stylesheets\StylesheetContract;
use Maartenpaauw\Chart\Stylesheets\StylesheetFactory;

class Stylesheet extends Component
{
    private StylesheetContract $strategy;

    public function __construct(StylesheetFactory $factory, string $cdn = '')
    {
        $this->strategy = $factory->create($cdn);
    }

    public function render(): View
    {
        return view('charts-css::components.stylesheet', [
            'href' => $this->strategy->href(),
        ]);
    }
}
