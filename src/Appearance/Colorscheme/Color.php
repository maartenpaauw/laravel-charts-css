<?php

namespace Maartenpaauw\Chart\Appearance\Colorscheme;

use Maartenpaauw\Chart\Declarations\ColorDeclaration;
use Maartenpaauw\Chart\Declarations\DeclarationContract;

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
