<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Declarations\Declarations;

class NullEntry implements EntryContract
{
    public function value(): string
    {
        return '-';
    }

    public function raw(): float
    {
        return 0;
    }

    public function declarations(): Declarations
    {
        return new Declarations();
    }

    public function color(ColorContract $color): EntryContract
    {
        return $this;
    }

    public function start(float $value): EntryContract
    {
        return $this;
    }

    public function label(): LabelContract
    {
        return new Label('-', new ModificationsBag());
    }

    public function hideLabel(): EntryContract
    {
        return $this;
    }
}
