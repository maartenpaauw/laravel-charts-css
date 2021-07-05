<?php

namespace Maartenpaauw\Chartscss\Declarations;

class RowColorDeclaration implements DeclarationContract
{
    private string $color;

    private int $row;

    public function __construct(string $color, int $row)
    {
        $this->color = $color;
        $this->row = $row;
    }

    public function toString(): string
    {
        return "--color-{$this->row}: {$this->color};";
    }
}
