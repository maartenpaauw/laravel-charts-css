<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Stylesheets\JSDelivrStylesheet;
use Maartenpaauw\Chart\Stylesheets\StylesheetStrategy;
use Maartenpaauw\Chart\Stylesheets\UnpkgStylesheet;

class Stylesheet extends Component
{
    private StylesheetStrategy $strategy;

    public function __construct(string $cdn)
    {
        if ($cdn === 'jsdelivr') {
            $this->strategy = new JSDelivrStylesheet();
        } elseif ($cdn === 'unpkg') {
            $this->strategy = new UnpkgStylesheet();
        }
    }

    public function href(): string
    {
        return $this->strategy->href();
    }

    public function render(): View
    {
        return view('charts-css::components.stylesheet');
    }
}
