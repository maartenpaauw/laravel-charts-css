<?php

namespace Maartenpaauw\Chart\Declarations;

class SizeDeclaration implements DeclarationContract
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
        return "--size: calc({$this->value} / {$this->max});";
    }
}
