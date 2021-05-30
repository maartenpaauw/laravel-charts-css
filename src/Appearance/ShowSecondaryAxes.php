<?php

namespace Maartenpaauw\Chart\Appearance;

use Maartenpaauw\Chart\Appearance\Exceptions\OutOfRangeException;

class ShowSecondaryAxes implements Modification
{
    private int $axes;

    /**
     * @throws OutOfRangeException
     */
    public function __construct(int $axes = 1)
    {
        if (1 > $axes || $axes > 10) {
            throw new OutOfRangeException($axes, 1, 10);
        }

        $this->axes = $axes;
    }

    public function classes(): array
    {
        return ["show-{$this->axes}-secondary-axes"];
    }
}
