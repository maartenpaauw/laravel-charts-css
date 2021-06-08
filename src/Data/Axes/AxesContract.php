<?php

namespace Maartenpaauw\Chart\Data\Axes;

interface AxesContract
{
    public function primary(): string;

    public function data(): string;
}
