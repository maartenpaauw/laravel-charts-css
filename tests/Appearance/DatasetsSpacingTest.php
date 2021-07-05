<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\DatasetsSpacing;
use Maartenpaauw\Chartscss\Appearance\Exceptions\OutOfRangeException;
use Maartenpaauw\Chartscss\Appearance\Modification;

class DatasetsSpacingTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new DatasetsSpacing(5);
    }

    public function classes(): array
    {
        return ['datasets-spacing-5'];
    }

    /** @test */
    public function it_should_space_the_datasets_with_one_by_default(): void
    {
        // Arrange
        $datasetsSpacing = new DatasetsSpacing();

        // Act
        $classes = $datasetsSpacing->classes();

        // Assert
        $this->assertContains('datasets-spacing-1', $classes);
    }

    /**
     * @test
     * @dataProvider spacingDataProvider
     */
    public function it_should_create_a_classname_based_on_the_given_amount_of_spacing(int $spacing, string $class): void
    {
        // Arrange
        $datasetsSpacing = new DatasetsSpacing($spacing);

        // Act
        $classes = $datasetsSpacing->classes();

        // Assert
        $this->assertContains($class, $classes);
    }

    public function spacingDataProvider(): array
    {
        return [
            [1, 'datasets-spacing-1'],
            [2, 'datasets-spacing-2'],
            [3, 'datasets-spacing-3'],
            [4, 'datasets-spacing-4'],
            [5, 'datasets-spacing-5'],
            [6, 'datasets-spacing-6'],
            [7, 'datasets-spacing-7'],
            [8, 'datasets-spacing-8'],
            [9, 'datasets-spacing-9'],
            [10, 'datasets-spacing-10'],
            [11, 'datasets-spacing-11'],
            [12, 'datasets-spacing-12'],
            [13, 'datasets-spacing-13'],
            [14, 'datasets-spacing-14'],
            [15, 'datasets-spacing-15'],
            [16, 'datasets-spacing-16'],
            [17, 'datasets-spacing-17'],
            [18, 'datasets-spacing-18'],
            [19, 'datasets-spacing-19'],
            [20, 'datasets-spacing-20'],
        ];
    }

    /** @test */
    public function it_should_throw_an_out_of_range_exception_when_the_given_spacing_is_less_than_one(): void
    {
        // Assert
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('The given axes amount `0` should be between 1 and 20.');

        // Arrange
        new DatasetsSpacing(0);
    }

    /** @test */
    public function it_should_throw_an_out_of_range_exception_when_the_given_spacing_is_more_than_twenty(): void
    {
        // Assert
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('The given axes amount `21` should be between 1 and 20.');

        // Arrange
        new DatasetsSpacing(21);
    }
}
