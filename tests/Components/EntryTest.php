<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Components\Entry as EntryComponent;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Tooltip\Tooltip;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Declarations\Declarations;
use Maartenpaauw\Chartscss\Declarations\SizeDeclaration;

class EntryTest extends AbstractComponentTest
{
    protected function component(): Component
    {
        $declarations = new Declarations([
            new SizeDeclaration(10, 20),
        ]);

        $entry = new Entry(
            new Value(10.5, '10.5k', $declarations),
            new Label('This is a label.'),
            new Tooltip('This is a tooltip.'),
        );

        return new EntryComponent($entry);
    }
}
