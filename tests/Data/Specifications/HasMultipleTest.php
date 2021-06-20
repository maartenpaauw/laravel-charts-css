<?php

namespace Maartenpaauw\Chart\Tests\Data\Specifications;

use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Entries\Label\Label;
use Maartenpaauw\Chart\Data\Specifications\HasMultiple;
use Maartenpaauw\Chart\Tests\TestCase;

class HasMultipleTest extends TestCase
{
    /** @test */
    public function it_should_return_false_when_there_are_zero_datasets(): void
    {
        // Arrange
        $hasMultiple = new HasMultiple();
        $datasets = new Datasets(new NullAxes(), []);

        // Act
        $satisfied = $hasMultiple->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_there_is_one_dataset(): void
    {
        // Arrange
        $hasMultiple = new HasMultiple();
        $datasets = new Datasets(new NullAxes(), [
            new Dataset([], new Label('Europe')),
        ]);

        // Act
        $satisfied = $hasMultiple->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_there_are_two_or_more_datasets(): void
    {
        // Arrange
        $hasMultiple = new HasMultiple();
        $datasets = new Datasets(new NullAxes(), [
            new Dataset([], new Label('Europe')),
            new Dataset([], new Label('Asia')),
        ]);

        // Act
        $satisfied = $hasMultiple->isSatisfiedBy($datasets);

        // Assert
        $this->assertTrue($satisfied);
    }
}
