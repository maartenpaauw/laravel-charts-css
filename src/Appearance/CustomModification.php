<?php

namespace Maartenpaauw\Chartscss\Appearance;

class CustomModification implements Modification
{
    private string $class;

    public function __construct(string $class)
    {
        $this->class = $class;
    }

    public function classes(): array
    {
        return [$this->class];
    }
}
