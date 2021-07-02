<?php

namespace Maartenpaauw\Chart\Data\Label;

use Maartenpaauw\Chart\Appearance\HideLabel;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Declarations\Declarations;

class HiddenLabel implements LabelContract
{
    private LabelContract $origin;

    public function __construct(LabelContract $origin)
    {
        $this->origin = $origin;
    }

    public function value(): string
    {
        return $this->origin->value();
    }

    public function modifications(): Modifications
    {
        return $this->origin
            ->modifications()
            ->add(new HideLabel());
    }

    public function declarations(): Declarations
    {
        return $this->origin->declarations();
    }
}
