<?php

namespace Maartenpaauw\Chartscss\Data\Entries;

use Maartenpaauw\Chartscss\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chartscss\Data\Entries\Value\SizedValue;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;
use Maartenpaauw\Chartscss\Statistics\StatisticContract;

class CalculatedEntry implements EntryContract
{
    private EntryContract $origin;

    private StatisticContract $maximum;

    public function __construct(EntryContract $origin, StatisticContract $maximum)
    {
        $this->origin = $origin;
        $this->maximum = $maximum;
    }

    public function value(): ValueContract
    {
        return new SizedValue(
            $this->origin->value(),
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
