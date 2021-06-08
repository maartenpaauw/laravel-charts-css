<?php

namespace Maartenpaauw\Chart\Data\Axes;

class Axes implements AxesContract
{
    private string $primary;

    private string $data;

    public function __construct(string $primary, string $data)
    {
        $this->primary = $primary;
        $this->data = $data;
    }

    public function primary(): string
    {
        return $this->primary;
    }

    public function data(): string
    {
        return $this->data;
    }
}
