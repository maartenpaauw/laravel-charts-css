<?php

namespace Maartenpaauw\Chartscss\Appearance;

class Modifications implements Modification
{
    /**
     * @var Modification[]
     */
    private array $modifications;

    /**
     * @param Modification[] $modifications
     */
    public function __construct(array $modifications = [])
    {
        $this->modifications = $modifications;
    }

    public function add(Modification $modification): self
    {
        return new self(array_merge($this->modifications, [$modification]));
    }

    public function classes(): array
    {
        return array_reduce($this->modifications, function (array $classes, Modification $modification) {
            return array_merge($classes, $modification->classes());
        }, []);
    }

    /**
     * @return Modification[]
     */
    public function toArray(): array
    {
        return $this->modifications;
    }

    public function toString(): string
    {
        return implode(' ', $this->classes());
    }
}
