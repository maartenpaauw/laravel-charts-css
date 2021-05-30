<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\DataSpacing;
use Maartenpaauw\Chart\Appearance\Exceptions\OutOfRangeException;
use Maartenpaauw\Chart\Appearance\Modification;

class DataSpacingTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new DataSpacing(5);
    }

    public function classes(): array
    {
        return ['data-spacing-5'];
    }

    /** @test */
    public function it_should_space_the_data_with_one_by_default(): void
    {
        // Arrange
        $dataSpacing = new DataSpacing();

        // Act
        $classes = $dataSpacing->classes();

        // Assert
        $this->assertContains('data-spacing-1', $classes);
    }

    /**
     * @test
     * @dataProvider spacingDataProvider
     */
    public function it_should_create_a_classname_based_on_the_given_amount_of_spacing(int $spacing, string $class): void
    {
        // Arrange
        $dataSpacing = new DataSpacing($spacing);

        // Act
        $classes = $dataSpacing->classes();

        // Assert
        $this->assertContains($class, $classes);
    }

    public function spacingDataProvider(): array
    {
        return [
            [1, 'data-spacing-1'],
            [2, 'data-spacing-2'],
            [3, 'data-spacing-3'],
            [4, 'data-spacing-4'],
            [5, 'data-spacing-5'],
            [6, 'data-spacing-6'],
            [7, 'data-spacing-7'],
            [8, 'data-spacing-8'],
            [9, 'data-spacing-9'],
            [10, 'data-spacing-10'],
            [11, 'data-spacing-11'],
            [12, 'data-spacing-12'],
            [13, 'data-spacing-13'],
            [14, 'data-spacing-14'],
            [15, 'data-spacing-15'],
            [16, 'data-spacing-16'],
            [17, 'data-spacing-17'],
            [18, 'data-spacing-18'],
            [19, 'data-spacing-19'],
            [20, 'data-spacing-20'],
        ];
    }

    /** @test */
    public function it_should_throw_an_out_of_range_exception_when_the_given_spacing_is_less_than_one(): void
    {
        // Assert
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('The given axes amount `0` should be between 1 and 20.');

        // Arrange
        new DataSpacing(0);
    }

    /** @test */
    public function it_should_throw_an_out_of_range_exception_when_the_given_spacing_is_more_than_twenty(): void
    {
        // Assert
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('The given axes amount `21` should be between 1 and 20.');

        // Arrange
        new DataSpacing(21);
    }
}
