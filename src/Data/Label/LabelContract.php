<?php

namespace Maartenpaauw\Chartscss\Data\Label;

use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Declarations\Declarations;

interface LabelContract
{
    public function value(): string;

    public function modifications(): Modifications;

    public function declarations(): Declarations;
}
