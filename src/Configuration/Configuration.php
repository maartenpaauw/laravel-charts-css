<?php

namespace Maartenpaauw\Chartscss\Configuration;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;

class Configuration implements ConfigurationContract
{
    private Identity $identity;

    private Legend $legend;

    private Modifications $modifications;

    private ColorschemeContract $colorscheme;

    public function __construct(
        Identity $identity,
        Legend $legend,
        Modifications $modifications,
        ColorschemeContract $colorscheme
    ) {
        $this->identity = $identity;
        $this->legend = $legend;
        $this->modifications = $modifications;
        $this->colorscheme = $colorscheme;
    }

    public function identity(): Identity
    {
        return $this->identity;
    }

    public function legend(): Legend
    {
        return $this->legend;
    }

    public function modifications(): Modifications
    {
        return $this->modifications;
    }

    public function colorscheme(): ColorschemeContract
    {
        return $this->colorscheme;
    }
}
