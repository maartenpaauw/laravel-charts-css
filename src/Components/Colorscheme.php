<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;

class Colorscheme extends Component
{
    private ConfigurationContract $configuration;

    public function __construct(ConfigurationContract $configuration)
    {
        $this->configuration = $configuration;
    }

    public function id(): string
    {
        return sprintf('#%s', $this->configuration->identity()->id());
    }

    /**
     * @return string[]
     */
    public function declarations(): array
    {
        return array_map(function (ColorContract $color) {
            return $color->declaration()->toString();
        }, $this->configuration->colorscheme()->colors());
    }

    public function render(): View
    {
        return view('charts-css::components.colorscheme');
    }
}
