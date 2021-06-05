<?php

namespace Maartenpaauw\Chart\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;

interface ConfigurationContract
{
    public function identity(): Identity;

    public function legend(): Legend;

    public function modifications(): ModificationsBag;

    public function colorscheme(): ColorschemeContract;
}
