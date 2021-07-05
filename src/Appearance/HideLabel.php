<?php

namespace Maartenpaauw\Chartscss\Appearance;

class HideLabel implements Modification
{
    public function classes(): array
    {
        return ['hide-label'];
    }
}
