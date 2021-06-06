<?php

namespace Maartenpaauw\Chart\Appearance\Colorscheme;

use Maartenpaauw\Chart\Declarations\DeclarationContract;

interface ColorContract
{
    public function value(): string;

    public function declaration(): DeclarationContract;
}
