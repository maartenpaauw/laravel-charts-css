<?php

namespace Maartenpaauw\Chartscss\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;

class Label extends Component
{
    private LabelContract $label;

    public function __construct(LabelContract $label)
    {
        $this->label = $label;
    }

    public function render(): View
    {
        return view('charts-css::components.label', [
            'classes' => $this->label->modifications()->toString(),
            'label' => $this->label->value(),
            'styling' => $this->label->declarations()->toString(),
        ]);
    }
}
