<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
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

    public function start(): float
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
}
