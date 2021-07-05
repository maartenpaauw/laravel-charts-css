<?php

namespace Maartenpaauw\Chartscss\Appearance;

class ReverseOrientation implements Modification
{
    public function classes(): array
    {
        return ['reverse'];
    }
}
