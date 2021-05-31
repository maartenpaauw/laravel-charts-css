<?php

namespace Maartenpaauw\Chart\Data;

class NullEntry implements EntryContract
{
    public function value(): string
    {
        return '-';
    }

    public function raw(): float
    {
        return 0;
    }

    public function start(): float
    {
        return 0;
    }
}
