<?php

namespace Maartenpaauw\Chart\Declarations;

class Declarations implements DeclarationContract
{
    /**
     * @var DeclarationContract[]
     */
    private array $declarations;

    public function __construct(array $declarations = [])
    {
        $this->declarations = $declarations;
    }

    public function add(DeclarationContract $declaration): self
    {
        $this->declarations[] = $declaration;

        return $this;
    }

    public function merge(Declarations $declarations): self
    {
        return new static(array_merge($this->toArray(), $declarations->toArray()));
    }

    public function toString(): string
    {
        return implode(' ', array_map(function (DeclarationContract $declaration) {
            return $declaration->toString();
        }, $this->declarations));
    }

    public function toArray(): array
    {
        return $this->declarations;
    }
}
