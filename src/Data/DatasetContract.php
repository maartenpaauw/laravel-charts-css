<?php

namespace Maartenpaauw\Chart\Data;

interface DatasetContract
{
    public function entries(): array;

    public function max(): float;
}
