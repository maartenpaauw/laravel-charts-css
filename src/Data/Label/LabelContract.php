<?php

namespace Maartenpaauw\Chart\Data\Label;

use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Declarations\Declarations;

interface LabelContract
{
    public function value(): string;

    public function modifications(): Modifications;

    public function declarations(): Declarations;
}
