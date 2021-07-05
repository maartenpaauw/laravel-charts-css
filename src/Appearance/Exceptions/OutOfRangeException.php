<?php

namespace Maartenpaauw\Chartscss\Appearance\Exceptions;

use InvalidArgumentException;

class OutOfRangeException extends InvalidArgumentException
{
    public function __construct(int $axes, int $start, int $end)
    {
        parent::__construct("The given axes amount `{$axes}` should be between {$start} and {$end}.");
    }
}
