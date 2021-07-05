<?php

namespace Maartenpaauw\Chartscss\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;

class Colorscheme extends Component
{
    public ConfigurationContract $configuration;

    public function __construct(ConfigurationContract $configuration)
    {
        $this->configuration = $configuration;
    }

    private function id(): string
    {
        return sprintf('#%s', $this->configuration->identity()->id());
    }

    private function declarations(): array
    {
        return array_map(function (ColorContract $color) {
            return $color->declaration()->toString();
        }, $this->configuration->colorscheme()->colors());
    }

    public function render(): View
    {
        return view('charts-css::components.colorscheme', [
            'id' => $this->id(),
            'declarations' => $this->declarations(),
        ]);
    }
}
