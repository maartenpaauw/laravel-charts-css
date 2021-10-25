<?php

namespace Maartenpaauw\Chartscss\Types;

class Line implements ChartType
{
    public function toString(): string
    {
        return 'line';
    }
}
