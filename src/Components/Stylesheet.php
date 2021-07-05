<?php

namespace Maartenpaauw\Chartscss\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chartscss\Stylesheets\StylesheetContract;
use Maartenpaauw\Chartscss\Stylesheets\StylesheetFactory;

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
