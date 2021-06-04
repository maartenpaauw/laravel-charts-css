<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Configuration\Configuration;

class Colorscheme extends Component
{
    private Configuration $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function id(): string
    {
        return sprintf('#%s', $this->configuration->id());
    }

    /**
     * @return string[]
     */
    public function declarations(): array
    {
        return array_map(function(ColorContract $color) {
            return $color->declaration();
        }, $this->configuration->colorscheme()->colors());
    }

    public function render(): View
    {
        return view('charts-css::components.colorscheme');
    }
}
