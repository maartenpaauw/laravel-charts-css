<?php

namespace Maartenpaauw\Chart\Tests\Appearance\Colorscheme;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\SpecificColor;
use Maartenpaauw\Chart\Tests\TestCase;

class ColorschemeTest extends TestCase
{
    /** @test */
    public function it_should_return_an_untouched_color_list_when_there_is_only_one_color_given(): void
    {
        // Arrange
        $color = new Color('#FF0000');
        $colorscheme = new Colorscheme([$color]);

        // Act
        [$red] = $colors = $colorscheme->colors();

        // Assert
        $this->assertCount(1, $colors);
        $this->assertEquals($red, $color);
    }

    /** @test */
    public function it_should_wrap_each_color_within_a_specific_row_color_decorator_when_multiple_colors_are_given(): void
    {
        // Arrange
        $colorscheme = new Colorscheme([
            new Color('#FF0000'),
            new Color('#00FF00'),
            new Color('#0000FF'),
        ]);

        // Act
        [$red, $green, $blue] = $colors = $colorscheme->colors();

        // Assert
        $this->assertCount(3, $colors);

        $this->assertInstanceOf(SpecificColor::class, $red);
        $this->assertInstanceOf(SpecificColor::class, $green);
        $this->assertInstanceOf(SpecificColor::class, $blue);

        $this->assertEquals('--color-1: #FF0000', $red->declaration());
        $this->assertEquals('--color-2: #00FF00', $green->declaration());
        $this->assertEquals('--color-3: #0000FF', $blue->declaration());
    }

    /** @test */
    public function it_should_return_an_empty_array_when_no_colors_are_given(): void
    {
        // Arrange
        $colorscheme = new Colorscheme([]);

        // Act
        $colors = $colorscheme->colors();

        // Assert
        $this->assertEmpty($colors);
    }
}
