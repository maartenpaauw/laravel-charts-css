<?php

namespace Maartenpaauw\Chart\Tests\Data\Specifications;

use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Specifications\DatasetsSpecification;
use Maartenpaauw\Chart\Data\Specifications\HasEntryLabels;
use Maartenpaauw\Chart\Tests\TestCase;

class HasEntryLabelsTest extends TestCase
{
    private DatasetsSpecification $hasLabels;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hasLabels = new HasEntryLabels();
    }

    /** @test */
    public function it_should_return_false_when_there_are_no_datasets(): void
    {
        // Arrange
        $datasets = new Datasets(new NullAxes());

        // Act
        $satisfied = $this->hasLabels->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_there_are_no_entries(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            [
                new Dataset(),
                new Dataset(),
            ],
        );

        // Act
        $satisfied = $this->hasLabels->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_there_is_no_entry_label_given(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            [
                new Dataset([
                    new Entry(new Value(10)),
                    new Entry(new Value(20)),
                ]),
                new Dataset([
                    new Entry(new Value(10)),
                    new Entry(new Value(20)),
                ]),
            ],
        );

        // Act
        $satisfied = $this->hasLabels->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_entry_label_is_an_empty_string(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            [
                new Dataset([
                    new Entry(new Value(10), new Label('')),
                    new Entry(new Value(20), new Label('')),
                ]),
                new Dataset([
                    new Entry(new Value(10), new Label('')),
                    new Entry(new Value(20), new Label('')),
                ]),
            ],
        );

        // Act
        $satisfied = $this->hasLabels->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_one_of_the_entry_labels_is_defined(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            [
                new Dataset([
                    new Entry(new Value(10), new Label('Label A')),
                    new Entry(new Value(20)),
                ]),
                new Dataset([
                    new Entry(new Value(10)),
                    new Entry(new Value(20)),
                ]),
            ],
        );

        // Act
        $satisfied = $this->hasLabels->isSatisfiedBy($datasets);

        // Assert
        $this->assertTrue($satisfied);
    }
}
