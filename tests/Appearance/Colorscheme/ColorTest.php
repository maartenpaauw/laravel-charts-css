<?php

namespace Maartenpaauw\Chart\Tests\Appearance\Colorscheme;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Tests\TestCase;

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
        $expectedVariable = '--color: #FF0000';

        // Act
        $variable = $this->color->declaration();

        // Assert
        $this->assertEquals($expectedVariable, $variable);
    }
}
