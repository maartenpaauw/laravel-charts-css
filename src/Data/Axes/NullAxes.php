<?php

namespace Maartenpaauw\Chart\Data\Axes;

class NullAxes implements AxesContract
{
    public function primary(): string
    {
        return '';
    }

    public function data(): string
    {
        return '';
    }
}
