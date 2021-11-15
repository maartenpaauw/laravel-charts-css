<?php

namespace Maartenpaauw\Chartscss\Data\Axes;

class Axes implements AxesContract
{
    private string $primary;

    /**
     * @var string[]
     */
    private array $data;

    /**
     * @param string|string[] $data
     */
    public function __construct(string $primary, $data)
    {
        $this->primary = $primary;
        $this->data = is_string($data) ? [$data] : $data;
    }

    public function primary(): string
    {
        return $this->primary;
    }

    public function data(): array
    {
        return $this->data;
    }
}
