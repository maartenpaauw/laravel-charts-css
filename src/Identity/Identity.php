<?php

namespace Maartenpaauw\Chart\Identity;

class Identity
{
    private string $description;

    private string $id;

    public function __construct(string $description, string $id)
    {
        $this->description = $description;
        $this->id = $id;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function toString(): string
    {
        return $this->id;
    }
}
