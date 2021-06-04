<?php

namespace Maartenpaauw\Chart\Appearance\Colorscheme;

interface ColorContract
{
    public function value(): string;

    public function declaration(): string;
}
