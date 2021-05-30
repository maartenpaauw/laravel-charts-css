<?php

namespace Maartenpaauw\Chart\Appearance;

use Maartenpaauw\Chart\Appearance\Exceptions\OutOfRangeException;

class DataSpacing extends RangeModification
{
    private int $spacing;

    /**
     * @throws OutOfRangeException
     */
    public function __construct(int $spacing = 1)
    {
        $this->validate($spacing);

        $this->spacing = $spacing;
    }

    protected function max(): int
    {
        return 20;
    }

    public function classes(): array
    {
        return ["data-spacing-{$this->spacing}"];
    }
}
