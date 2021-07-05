<?php

namespace Maartenpaauw\Chartscss\Data\Label;

use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Declarations\Declarations;

class NullLabel implements LabelContract
{
    public function value(): string
    {
        return '';
    }

    public function modifications(): Modifications
    {
        return new Modifications();
    }

    public function declarations(): Declarations
    {
        return new Declarations();
    }
}
