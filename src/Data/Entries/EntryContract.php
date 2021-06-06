<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Declarations\Declarations;

interface EntryContract
{
    public function value(): string;

    public function raw(): float;

    public function start(): float;

    public function declarations(): Declarations;

    public function color(ColorContract $color): self;
}
