<?php

namespace Maartenpaauw\Chartscss\Appearance;

use Maartenpaauw\Chartscss\Appearance\Exceptions\OutOfRangeException;

class ShowSecondaryAxes extends RangeModification
{
    private int $axes;

    /**
     * @throws OutOfRangeException
     */
    public function __construct(int $axes = 1)
    {
        $this->validate($axes);

        $this->axes = $axes;
    }

    public function classes(): array
    {
        return ["show-{$this->axes}-secondary-axes"];
    }
}
