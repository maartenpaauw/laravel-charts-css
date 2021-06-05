<?php

namespace Maartenpaauw\Chart\Appearance\Colorscheme;

interface ColorschemeContract
{
    /**
     * @return ColorContract[]
     */
    public function colors(): array;

    public function add(ColorContract $color): ColorschemeContract;
}
