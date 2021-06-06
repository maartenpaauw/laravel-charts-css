<?php

namespace Maartenpaauw\Chart\Data\Entries;

interface EntryContract
{
    public function value(): string;

    public function raw(): float;

    public function start(): float;
}
