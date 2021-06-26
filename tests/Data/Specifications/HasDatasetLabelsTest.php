<?php

namespace Maartenpaauw\Chart\Tests\Data\Specifications;

use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Specifications\DatasetsSpecification;
use Maartenpaauw\Chart\Data\Specifications\HasDatasetLabels;
use Maartenpaauw\Chart\Tests\TestCase;

class HasDatasetLabelsTest extends TestCase
{
    private DatasetsSpecification $hasDatasetLabels;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hasDatasetLabels = new HasDatasetLabels();
    }

    /** @test */
    public function it_should_return_false_when_there_are_no_datasets(): void
    {
        // Arrange
        $datasets = new Datasets(new NullAxes());

        // Act
        $satisfied = $this->hasDatasetLabels->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_there_is_no_dataset_label_given(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            new Dataset(),
            new Dataset(),
        );

        // Act
        $satisfied = $this->hasDatasetLabels->isSatisfiedBy($datasets);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_one_of_the_datasets_has_a_label_defined(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            new Dataset([], new Label('Label A')),
            new Dataset(),
        );

        // Act
        $satisfied = $this->hasDatasetLabels->isSatisfiedBy($datasets);

        // Assert
        $this->assertTrue($satisfied);
    }
}
