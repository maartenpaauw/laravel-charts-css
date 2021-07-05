<?php

namespace Maartenpaauw\Chartscss\Data\Entries\Value;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chartscss\Declarations\Declarations;

class ColorfulValue implements ValueContract
{
    private ValueContract $origin;

    private ColorContract $color;

    public function __construct(ValueContract $origin, ColorContract $color)
    {
        $this->origin = $origin;
        $this->color = $color;
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
            ->add($this->color->declaration());
    }
}
