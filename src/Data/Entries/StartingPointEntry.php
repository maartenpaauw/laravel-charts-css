<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
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

    public function value(): string
    {
        return $this->origin->value();
    }

    public function raw(): float
    {
        return $this->origin->raw();
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
                new StartDeclaration($this->previous->raw(), $this->max),
            ]));
    }

    public function color(ColorContract $color): EntryContract
    {
        return $this->origin->color($color);
    }

    public function start(float $value): EntryContract
    {
        return $this;
    }

    public function hideLabel(): EntryContract
    {
        $this->origin->hideLabel();

        return $this;
    }
}
