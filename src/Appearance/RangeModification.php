<?php

namespace Maartenpaauw\Chart\Appearance;

use Maartenpaauw\Chart\Appearance\Exceptions\OutOfRangeException;

abstract class RangeModification implements Modification
{
    protected function min(): int
    {
        return 1;
    }

    protected function max(): int
    {
        return 10;
    }

    /**
     * @throws OutOfRangeException
     */
    protected function validate(int $value): void
    {
        if ($this->min() > $value || $value > $this->max()) {
            throw new OutOfRangeException($value, $this->min(), $this->max());
        }
    }
}
