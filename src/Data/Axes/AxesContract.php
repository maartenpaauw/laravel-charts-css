<?php

namespace Maartenpaauw\Chart\Data\Axes;

interface AxesContract
{
    public function primary(): string;

    /**
     * @return string[]
     */
    public function data(): array;
}
