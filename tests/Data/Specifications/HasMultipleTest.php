<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Data\Specifications\HasMultiple;
use Maartenpaauw\Chartscss\Tests\TestCase;

class HasMultipleTest extends TestCase
{
    private HasMultiple $hasMultiple;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hasMultiple = new HasMultiple();
    }

    /** @test */
    public function it_should_return_false_when_there_are_zero_datasets(): void
    {
        // Arrange
        $datasets = new Datasets(new NullAxes());

        // Act
        $satisfied = $this->hasMultiple->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_there_is_one_dataset(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            new Dataset([], new Label('Europe')),
        );

        // Act
        $satisfied = $this->hasMultiple->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_there_are_two_or_more_datasets(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            new Dataset([], new Label('Europe')),
            new Dataset([], new Label('Asia')),
        );

        // Act
        $satisfied = $this->hasMultiple->isSatisfiedBy($datasets);

        // Assert
        $this->assertTrue($satisfied);
    }
}
