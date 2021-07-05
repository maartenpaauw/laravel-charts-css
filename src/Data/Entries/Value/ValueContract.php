<?php

namespace Maartenpaauw\Chartscss\Data\Entries\Value;

use Maartenpaauw\Chartscss\Declarations\Declarations;

interface ValueContract
{
    public function raw(): float;

    public function display(): string;

    public function declarations(): Declarations;
}
