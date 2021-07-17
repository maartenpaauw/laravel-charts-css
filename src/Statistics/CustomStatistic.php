<?php

namespace Maartenpaauw\Chartscss\Statistics;

class CustomStatistic implements StatisticContract
{
    private float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function result(): float
    {
        return $this->value;
    }
}
