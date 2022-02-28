<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Data\Specifications\HasDatasetLabels;
use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Specifications\Specification;

class HasDatasetLabelsTest extends TestCase
{
    /** @var Specification<DatasetsContract> */
    private Specification $hasDatasetLabels;

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
