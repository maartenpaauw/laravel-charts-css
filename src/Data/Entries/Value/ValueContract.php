<?php

namespace Maartenpaauw\Chart\Data\Entries\Value;

use Maartenpaauw\Chart\Declarations\Declarations;

interface ValueContract
{
    public function raw(): float;

    public function display(): string;

    public function declarations(): Declarations;
}
