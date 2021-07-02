<?php

namespace Maartenpaauw\Chart\Data\Label;

use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Declarations\Declarations;

class Label implements LabelContract
{
    private string $value;

    private Modifications $modifications;

    private Declarations $declarations;

    public function __construct(string $value, ?Modifications $modifications = null, ?Declarations $declarations = null)
    {
        $this->value = $value;
        $this->modifications = $modifications ?? new Modifications();
        $this->declarations = $declarations ?? new Declarations();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function modifications(): Modifications
    {
        return $this->modifications;
    }

    public function declarations(): Declarations
    {
        return $this->declarations;
    }
}
