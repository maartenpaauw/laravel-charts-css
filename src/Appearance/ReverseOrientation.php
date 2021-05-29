<?php

namespace Maartenpaauw\Chart\Appearance;

class ReverseOrientation implements Modification
{
    public function classes(): array
    {
        return ['reverse'];
    }
}
