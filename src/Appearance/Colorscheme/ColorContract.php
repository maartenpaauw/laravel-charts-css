<?php

namespace Maartenpaauw\Chartscss\Appearance\Colorscheme;

use Maartenpaauw\Chartscss\Declarations\DeclarationContract;

interface ColorContract
{
    public function value(): string;

    public function declaration(): DeclarationContract;
}
