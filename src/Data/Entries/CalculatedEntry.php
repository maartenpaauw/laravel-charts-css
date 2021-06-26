<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Declarations\SizeDeclaration;

class CalculatedEntry implements EntryContract
{
    private EntryContract $origin;

    private float $max;

    public function __construct(EntryContract $origin, float $max)
    {
        $this->origin = $origin;
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
                new SizeDeclaration($this->origin->raw(), $this->max),
            ]));
    }

    public function color(ColorContract $color): EntryContract
    {
        return $this->origin->color($color);
    }

    public function start(float $value): EntryContract
    {
        $this->origin->start($value);

        return $this;
    }

    public function hideLabel(): EntryContract
    {
        $this->origin->hideLabel();

        return $this;
    }
}
