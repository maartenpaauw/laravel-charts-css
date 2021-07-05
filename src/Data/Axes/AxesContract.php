<?php

namespace Maartenpaauw\Chartscss\Data\Axes;

interface AxesContract
{
    public function primary(): string;

    /**
     * @return string[]
     */
    public function data(): array;
}
