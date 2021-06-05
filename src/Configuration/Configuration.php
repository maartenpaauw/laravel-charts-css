<?php

namespace Maartenpaauw\Chart\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;

class Configuration
{
    private Identity $identity;

    private Legend $legend;

    private ModificationsBag $modifications;

    private ColorschemeContract $colorscheme;

    public function __construct(
        Identity $identity,
        Legend $legend,
        ModificationsBag $modifications,
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

    public function modifications(): ModificationsBag
    {
        return $this->modifications;
    }

    public function colorscheme(): ColorschemeContract
    {
        return $this->colorscheme;
    }
}
