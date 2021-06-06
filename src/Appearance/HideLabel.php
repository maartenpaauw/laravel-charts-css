<?php

namespace Maartenpaauw\Chart\Appearance;

class HideLabel implements Modification
{
    public function classes(): array
    {
        return ['hide-label'];
    }
}
