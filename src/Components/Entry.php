<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Data\Entries\EntryContract;

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
            'styling' => $this->entry->declarations()->toString(),
            'value' => $this->entry->value(),
        ]);
    }
}
