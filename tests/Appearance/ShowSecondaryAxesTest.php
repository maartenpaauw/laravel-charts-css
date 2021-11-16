<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Exceptions\OutOfRangeException;
use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\ShowSecondaryAxes;

class ShowSecondaryAxesTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ShowSecondaryAxes(5);
    }

    public function classes(): array
    {
        return ['show-5-secondary-axes'];
    }

    /** @test */
    public function it_should_show_one_secondary_axes_by_default(): void
    {
        // Arrange
        $showSecondaryAxes = new ShowSecondaryAxes();

        // Act
        $classes = $showSecondaryAxes->classes();

        // Assert
        $this->assertContains('show-1-secondary-axes', $classes);
    }

    /**
     * @test
     * @dataProvider axesDataProvider
     */
    public function it_should_create_a_classname_based_on_the_given_amount_of_axes(int $axes, string $class): void
    {
        // Arrange
        $showSecondaryAxes = new ShowSecondaryAxes($axes);

        // Act
        $classes = $showSecondaryAxes->classes();

        // Assert
        $this->assertContains($class, $classes);
    }

    /**
     * @return array<array<int|string>>
     */
    public function axesDataProvider(): array
    {
        return [
            [1, 'show-1-secondary-axes'],
            [2, 'show-2-secondary-axes'],
            [3, 'show-3-secondary-axes'],
            [4, 'show-4-secondary-axes'],
            [5, 'show-5-secondary-axes'],
            [6, 'show-6-secondary-axes'],
            [7, 'show-7-secondary-axes'],
            [8, 'show-8-secondary-axes'],
            [9, 'show-9-secondary-axes'],
            [10, 'show-10-secondary-axes'],
        ];
    }

    /** @test */
    public function it_should_throw_an_out_of_range_exception_when_the_given_amount_is_less_than_one(): void
    {
        // Assert
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('The given axes amount `0` should be between 1 and 10.');

        // Arrange
        new ShowSecondaryAxes(0);
    }

    /** @test */
    public function it_should_throw_an_out_of_range_exception_when_the_given_amount_is_more_than_ten(): void
    {
        // Assert
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('The given axes amount `11` should be between 1 and 10.');

        // Arrange
        new ShowSecondaryAxes(11);
    }
}
