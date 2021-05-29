<?php

namespace Maartenpaauw\Chart\Legend;

class Legend
{
    public array $labels;

    public Appearance $appearance;

    public function __construct(array $labels, Appearance $appearance)
    {
        $this->labels = $labels;
        $this->appearance = $appearance;
    }
}
