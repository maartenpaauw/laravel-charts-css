<?php

namespace Maartenpaauw\Chartscss\Appearance\Colorscheme;

use Maartenpaauw\Chartscss\Declarations\ColorDeclaration;
use Maartenpaauw\Chartscss\Declarations\DeclarationContract;

class Color implements ColorContract
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function declaration(): DeclarationContract
    {
        return new ColorDeclaration($this->value());
    }
}
