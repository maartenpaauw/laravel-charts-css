<?php

namespace Maartenpaauw\Chartscss\Data\Entries;

use Maartenpaauw\Chartscss\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chartscss\Data\Entries\Value\StartValue;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;
use Maartenpaauw\Chartscss\Statistics\StatisticContract;

class StartingPointEntry implements EntryContract
{
    private EntryContract $origin;

    private EntryContract $previous;

    private StatisticContract $maximum;

    public function __construct(EntryContract $origin, EntryContract $previous, StatisticContract $maximum)
    {
        $this->origin = $origin;
        $this->previous = $previous;
        $this->maximum = $maximum;
    }

    public function value(): ValueContract
    {
        return new StartValue(
            $this->origin->value(),
            $this->previous->value()->raw(),
            $this->maximum->result(),
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
