<?php

namespace Maartenpaauw\Chart\Tests\Legend;

use Maartenpaauw\Chart\Legend\Appearance;
use Maartenpaauw\Chart\Legend\Shape;
use Maartenpaauw\Chart\Tests\TestCase;

class AppearanceTest extends TestCase
{
    /** @test */
    public function it_should_return_an_empty_array_with_the_default_constructor_parameters(): void
    {
        // Arrange
        $appearance = new Appearance();

        // Act
        $classes = $appearance->classes();

        // Assert
        $this->assertEmpty($classes);
    }

    /** @test */
    public function it_should_add_the_class_legend_inline_when_the_flag_inline_is_true(): void
    {
        // Arrange
        $appearance = new Appearance(true);

        // Act
        $classes = $appearance->classes();

        // Assert
        $this->assertCount(1, $classes);
        $this->assertContains('legend-inline', $classes);
    }

    /**
     * @test
     * @dataProvider shapeDataProvider
     */
    public function it_should_add_the_class_legend_shape_when_a_shape_is_given(string $shape, string $class): void
    {
        // Arrange
        $appearance = new Appearance(false, $shape);

        // Act
        $classes = $appearance->classes();

        // Assert
        $this->assertCount(1, $classes);
        $this->assertContains($class, $classes);
    }

    public function shapeDataProvider(): array
    {
        return [
            'circle' => [Shape::CIRCLE, 'legend-circle'],
            'ellipse' => [Shape::ELLIPSE, 'legend-ellipse'],
            'line' => [Shape::LINE, 'legend-line'],
            'rectangle' => [Shape::RECTANGLE, 'legend-rectangle'],
            'rhombus' => [Shape::RHOMBUS, 'legend-rhombus'],
            'square' => [Shape::SQUARE, 'legend-square'],
        ];
    }
}
