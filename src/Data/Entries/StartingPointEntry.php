<?php

namespace Maartenpaauw\Chart\Data\Entries;

class StartingPointEntry implements EntryContract
{
    private EntryContract $origin;

    private EntryContract $previous;

    public function __construct(EntryContract $origin, EntryContract $previous)
    {
        $this->origin = $origin;
        $this->previous = $previous;
    }

    public function value(): string
    {
        return $this->origin->value();
    }

    public function raw(): float
    {
        return $this->origin->raw();
    }

    public function start(): float
    {
        return $this->previous->raw();
    }
}
