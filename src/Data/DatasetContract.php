<?php

namespace Maartenpaauw\Chart\Data;

interface DatasetContract
{
    /**
     * @return EntryContract[]
     */
    public function entries(): array;

    public function label(): string;

    public function max(): float;
}
