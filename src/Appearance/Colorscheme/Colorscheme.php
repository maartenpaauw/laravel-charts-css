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
        $colors = array_values($this->colors);

        if (count($colors) <= 1) {
            return $colors;
        }

        return array_map(function (ColorContract $color, int $index) {
            return new SpecificColor($color, $index + 1);
        }, $colors, array_keys($colors));
    }
}
