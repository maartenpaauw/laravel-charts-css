<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Declarations\Declarations;

interface EntryContract
{
    public function value(): string;

    public function raw(): float;

    public function label(): LabelContract;

    public function declarations(): Declarations;

    public function color(ColorContract $color): EntryContract;

    public function hideLabel(): EntryContract;
}
