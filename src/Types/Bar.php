<?php

namespace Maartenpaauw\Chartscss\Types;

class Bar implements ChartType
{
    public function toString(): string
    {
        return 'bar';
    }
}
