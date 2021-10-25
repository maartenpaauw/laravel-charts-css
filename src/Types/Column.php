<?php

namespace Maartenpaauw\Chartscss\Types;

class Column implements ChartType
{
    public function toString(): string
    {
        return 'column';
    }
}
