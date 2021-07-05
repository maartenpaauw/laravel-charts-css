<?php

namespace Maartenpaauw\Chartscss\Declarations;

class ColorDeclaration implements DeclarationContract
{
    private string $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function toString(): string
    {
        return "--color: {$this->color};";
    }
}
