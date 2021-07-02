<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Data\Entries\Value\SizedValue;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Data\Label\LabelContract;

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
            $this->origin->value()->raw(),
            $this->max,
        );
    }

    public function label(): LabelContract
    {
        return $this->origin->label();
    }
}
