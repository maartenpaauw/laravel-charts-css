<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance\Colorscheme;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Color;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chartscss\Declarations\ColorDeclaration;
use Maartenpaauw\Chartscss\Tests\TestCase;

class ColorTest extends TestCase
{
    private ColorContract $color;

    protected function setUp(): void
    {
        parent::setUp();

        $this->color = new Color('#FF0000');
    }

    /** @test */
    public function it_should_return_the_given_value_correctly(): void
    {
        // Arrange
        $expectedValue = '#FF0000';

        // Act
        $value = $this->color->value();

        // Assert
        $this->assertEquals($expectedValue, $value);
    }

    /** @test */
    public function it_should_be_possible_to_convert_it_to_a_css_variable_declaration(): void
    {
        // Arrange
        $expectedString = '--color: #FF0000;';

        // Act
        $declaration = $this->color->declaration();

        // Assert
        $this->assertInstanceOf(ColorDeclaration::class, $declaration);
        $this->assertEquals($expectedString, $declaration->toString());
    }
}
