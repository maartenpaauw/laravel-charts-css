<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Data\Label\NullLabel;
use Maartenpaauw\Chartscss\Data\Specifications\HasEntryLabels;
use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Specifications\Specification;

class HasEntryLabelsTest extends TestCase
{
    /** @var Specification<DatasetsContract> */
    private Specification $hasLabels;

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
            new Dataset(),
            new Dataset(),
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
            new Dataset([
                new Entry(new Value(10)),
                new Entry(new Value(20)),
            ]),
            new Dataset([
                new Entry(new Value(10)),
                new Entry(new Value(20)),
            ]),
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
            new Dataset([
                new Entry(new Value(10), new NullLabel()),
                new Entry(new Value(20), new NullLabel()),
            ]),
            new Dataset([
                new Entry(new Value(10), new NullLabel()),
                new Entry(new Value(20), new NullLabel()),
            ]),
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
            new Dataset([
                new Entry(new Value(10), new Label('Label A')),
                new Entry(new Value(20)),
            ]),
            new Dataset([
                new Entry(new Value(10)),
                new Entry(new Value(20)),
            ]),
        );

        // Act
        $satisfied = $this->hasLabels->isSatisfiedBy($datasets);

        // Assert
        $this->assertTrue($satisfied);
    }
}
