<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Components\Label as LabelComponent;
use Maartenpaauw\Chartscss\Data\Label\AlignedLabel;
use Maartenpaauw\Chartscss\Data\Label\HiddenLabel;
use Maartenpaauw\Chartscss\Data\Label\Label;

class LabelTest extends AbstractComponentTest
{
    protected function component(): Component
    {
        $label = new AlignedLabel(
            new HiddenLabel(new Label('Label A')),
            'center',
        );

        return new LabelComponent($label);
    }
}
