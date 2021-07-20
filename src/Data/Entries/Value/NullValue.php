<?php

namespace Maartenpaauw\Chartscss\Data\Entries\Value;

use Maartenpaauw\Chartscss\Declarations\Declarations;

class NullValue implements ValueContract
{
    public function raw(): float
    {
        return 0;
    }

    public function display(): string
    {
        return '0';
    }

    public function declarations(): Declarations
    {
        return new Declarations();
    }
}
