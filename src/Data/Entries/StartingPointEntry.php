<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Declarations\StartDeclaration;

class StartingPointEntry implements EntryContract
{
    private EntryContract $origin;

    private EntryContract $previous;

    private float $max;

    public function __construct(EntryContract $origin, EntryContract $previous, float $max)
    {
        $this->origin = $origin;
        $this->previous = $previous;
        $this->max = $max;
    }

    public function value(): ValueContract
    {
        return $this->origin->value();
    }

    public function label(): LabelContract
    {
        return $this->origin->label();
    }

    public function declarations(): Declarations
    {
        return $this->origin
            ->declarations()
            ->merge(new Declarations([
                new StartDeclaration($this->previous->value()->raw(), $this->max),
            ]));
    }
}
