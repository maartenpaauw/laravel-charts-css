<?php

namespace Maartenpaauw\Chart\Tests\Appearance\Colorscheme;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Appearance\Colorscheme\SpecificColor;
use Maartenpaauw\Chart\Tests\TestCase;

class SpecificColorTest extends TestCase
{
    private ColorContract $color;

    private ColorContract $specificColor;

    protected function setUp(): void
    {
        parent::setUp();

        $this->color = new Color('#00FF00');
        $this->specificColor = new SpecificColor($this->color, 3);
    }

    /** @test */
    public function it_should_return_the_value_of_the_origin_color(): void
    {
        // Arrange
        $expectedValue = $this->color->value();

        // Act
        $value = $this->specificColor->value();

        // Assert
        $this->assertEquals($expectedValue, $value);
    }

    /** @test */
    public function it_should_add_the_row_definition_to_the_css_color_variable_declaration(): void
    {
        // Arrange
        $expectedDeclaration = '--color-3: #00FF00;';

        // Act
        $declaration = $this->specificColor->declaration();

        // Assert
        $this->assertEquals($expectedDeclaration, $declaration);
    }
}
