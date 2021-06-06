<?php

namespace Maartenpaauw\Chart\Identity;

use Maartenpaauw\Chart\Types\ChartType;

class Identity
{
    private string $id;

    private string $description;

    private ChartType $type;

    public function __construct(string $id, string $description, ChartType $type)
    {
        $this->id = $id;
        $this->description = $description;
        $this->type = $type;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function type(): ChartType
    {
        return $this->type;
    }
}
