<?php

namespace Maartenpaauw\Chart\Data\Entries\Value;

use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Declarations\StartDeclaration;

class StartValue implements ValueContract
{
    private ValueContract $origin;

    private float $start;

    public function __construct(ValueContract $origin, float $start)
    {
        $this->origin = $origin;
        $this->start = $start;
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
            ->add(new StartDeclaration($this->start, 1));
    }
}
