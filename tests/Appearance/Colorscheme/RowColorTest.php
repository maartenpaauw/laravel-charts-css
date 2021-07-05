<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance\Colorscheme;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Color;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\RowColor;
use Maartenpaauw\Chartscss\Declarations\RowColorDeclaration;
use Maartenpaauw\Chartscss\Tests\TestCase;

class RowColorTest extends TestCase
{
    private ColorContract $color;

    private ColorContract $rowColor;

    protected function setUp(): void
    {
        parent::setUp();

        $this->color = new Color('#00FF00');
        $this->rowColor = new RowColor($this->color, 3);
    }

    /** @test */
    public function it_should_return_the_value_of_the_origin_color(): void
    {
        // Arrange
        $expectedValue = $this->color->value();

        // Act
        $value = $this->rowColor->value();

        // Assert
        $this->assertEquals($expectedValue, $value);
    }

    /** @test */
    public function it_should_add_the_row_definition_to_the_css_color_variable_declaration(): void
    {
        // Arrange
        $expectedString = '--color-3: #00FF00;';

        // Act
        $declaration = $this->rowColor->declaration();

        // Assert
        $this->assertInstanceOf(RowColorDeclaration::class, $declaration);
        $this->assertEquals($expectedString, $declaration->toString());
    }
}
