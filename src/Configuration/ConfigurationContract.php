<?php

namespace Maartenpaauw\Chart\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;

interface ConfigurationContract
{
    public function identity(): Identity;

    public function legend(): Legend;

    public function modifications(): Modifications;

    public function colorscheme(): ColorschemeContract;
}
