<?php

namespace Maartenpaauw\Chartscss\Data\Entries;

use Maartenpaauw\Chartscss\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chartscss\Data\Entries\Value\SizedValue;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;

class CalculatedEntry implements EntryContract
{
    private EntryContract $origin;

    private float $max;

    public function __construct(EntryContract $origin, float $max)
    {
        $this->origin = $origin;
        $this->max = $max;
    }

    public function value(): ValueContract
    {
        return new SizedValue(
            $this->origin->value(),
            $this->max,
        );
    }

    public function label(): LabelContract
    {
        return $this->origin->label();
    }

    public function tooltip(): TooltipContract
    {
        return $this->origin->tooltip();
    }
}
