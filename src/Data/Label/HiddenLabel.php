<?php

namespace Maartenpaauw\Chartscss\Data\Label;

use Maartenpaauw\Chartscss\Appearance\HideLabel;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Declarations\Declarations;

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
