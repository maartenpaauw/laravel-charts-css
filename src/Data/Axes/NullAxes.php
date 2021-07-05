<?php

namespace Maartenpaauw\Chartscss\Data\Axes;

class NullAxes implements AxesContract
{
    public function primary(): string
    {
        return '';
    }

    public function data(): array
    {
        return [];
    }
}
