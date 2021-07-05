<?php

namespace Maartenpaauw\Chartscss\Configuration;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;

interface ConfigurationContract
{
    public function identity(): Identity;

    public function legend(): Legend;

    public function modifications(): Modifications;

    public function colorscheme(): ColorschemeContract;
}
