<?php

namespace Maartenpaauw\Chart\Appearance;

class HideData implements Modification
{
    public function classes(): array
    {
        return ['hide-data'];
    }
}
