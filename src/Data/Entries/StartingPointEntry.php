<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Data\Entries\Value\Value;
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
        $declarations = $this->origin
            ->value()
            ->declarations()
            ->merge(new Declarations([
                new StartDeclaration($this->previous->value()->raw(), $this->max),
            ]));

        return new Value(
            $this->origin->value()->raw(),
            $this->origin->value()->display(),
            $declarations,
        );
    }

    public function label(): LabelContract
    {
        return $this->origin->label();
    }
}
