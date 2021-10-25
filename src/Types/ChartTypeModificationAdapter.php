<?php

namespace Maartenpaauw\Chartscss\Types;

use Maartenpaauw\Chartscss\Appearance\Modification;

class ChartTypeModificationAdapter implements Modification
{
    private ChartType $chartType;

    public function __construct(ChartType $chartType)
    {
        $this->chartType = $chartType;
    }

    public function classes(): array
    {
        return [$this->chartType->toString()];
    }
}
