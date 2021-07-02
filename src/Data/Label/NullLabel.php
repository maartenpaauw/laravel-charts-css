<?php

namespace Maartenpaauw\Chart\Data\Label;

use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Declarations\Declarations;

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
