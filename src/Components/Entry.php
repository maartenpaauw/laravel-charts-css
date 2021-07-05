<?php

namespace Maartenpaauw\Chartscss\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chartscss\Data\Entries\EntryContract;

class Entry extends Component
{
    private EntryContract $entry;

    public function __construct(EntryContract $entry)
    {
        $this->entry = $entry;
    }

    public function render(): View
    {
        return view('charts-css::components.entry', [
            'styling' => $this->entry->value()->declarations()->toString(),
            'tooltip' => $this->entry->tooltip()->content(),
            'value' => $this->entry->value()->display(),
        ]);
    }
}
