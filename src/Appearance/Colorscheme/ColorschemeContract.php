<?php

namespace Maartenpaauw\Chart\Appearance\Colorscheme;

interface ColorschemeContract
{
    /**
     * @return ColorContract[]
     */
    public function colors(): array;
}
