<?php

namespace Maartenpaauw\Chart\Data;

interface DatasetContract
{
    public function entries(): array;

    public function label(): string;

    public function max(): float;
}
