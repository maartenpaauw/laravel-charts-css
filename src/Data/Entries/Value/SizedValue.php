<?php

namespace Maartenpaauw\Chartscss\Data\Entries\Value;

use Maartenpaauw\Chartscss\Declarations\DeclarationContract;
use Maartenpaauw\Chartscss\Declarations\Declarations;
use Maartenpaauw\Chartscss\Declarations\SizeDeclaration;

class SizedValue implements ValueContract
{
    private ValueContract $origin;

    private DeclarationContract $declaration;

    public function __construct(ValueContract $origin, float $max)
    {
        $this->origin = $origin;
        $this->declaration = new SizeDeclaration($origin->raw(), $max);
    }

    public function raw(): float
    {
        return $this->origin->raw();
    }

    public function display(): string
    {
        return $this->origin->display();
    }

    public function declarations(): Declarations
    {
        return $this->origin
            ->declarations()
            ->add($this->declaration);
    }
}
