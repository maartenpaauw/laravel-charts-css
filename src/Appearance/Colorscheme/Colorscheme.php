<?php

namespace Maartenpaauw\Chart\Appearance\Colorscheme;

class Colorscheme implements ColorschemeContract
{
    /**
     * @var ColorContract[]
     */
    private array $colors;

    public function __construct(array $colors = [])
    {
        $this->colors = $colors;
    }

    public function add(ColorContract $color): ColorschemeContract
    {
        $this->colors[] = $color;

        return $this;
    }

    /**
     * @return ColorContract[]
     */
    public function colors(): array
    {
        if (count($this->colors) <= 1) {
            return $this->colors;
        }

        return array_map(function (ColorContract $color, int $row) {
            return new SpecificColor($color, $row);
        }, $this->colors, range(1, count($this->colors)));
    }
}
