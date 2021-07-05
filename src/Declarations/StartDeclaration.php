<?php

namespace Maartenpaauw\Chartscss\Declarations;

class StartDeclaration implements DeclarationContract
{
    private float $value;

    private float $max;

    public function __construct(float $value, float $max)
    {
        $this->value = $value;
        $this->max = $max;
    }

    public function toString(): string
    {
        return "--start: calc({$this->value} / {$this->max});";
    }
}
