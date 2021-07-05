<?php

namespace Maartenpaauw\Chartscss\Appearance\Colorscheme;

use Maartenpaauw\Chartscss\Declarations\DeclarationContract;
use Maartenpaauw\Chartscss\Declarations\RowColorDeclaration;

class RowColor implements ColorContract
{
    private ColorContract $origin;

    private int $row;

    public function __construct(ColorContract $origin, int $row)
    {
        $this->origin = $origin;
        $this->row = $row;
    }

    public function value(): string
    {
        return $this->origin->value();
    }

    public function declaration(): DeclarationContract
    {
        return new RowColorDeclaration($this->value(), $this->row);
    }
}
