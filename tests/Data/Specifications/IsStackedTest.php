<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Specifications;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\PercentageStackedDatasets;
use Maartenpaauw\Chartscss\Data\Datasets\SimpleStackedDatasets;
use Maartenpaauw\Chartscss\Data\Specifications\IsStacked;
use Maartenpaauw\Chartscss\Tests\TestCase;

class IsStackedTest extends TestCase
{
    private IsStacked $isStacked;

    private Datasets $datasets;

    protected function setUp(): void
    {
        parent::setUp();

        $this->isStacked = new IsStacked();
        $this->datasets = new Datasets(new NullAxes());
    }

    /** @test */
    public function it_should_return_true_when_a_simple_stacked_datasets_instance_is_given(): void
    {
        // Arrange
        $simpleStackedDatasets = new SimpleStackedDatasets($this->datasets);

        // Act
        $satisfied = $this->isStacked->isSatisfiedBy($simpleStackedDatasets);

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_a_percentage_stacked_datasets_instance_is_given(): void
    {
        // Arrange
        $percentageStackedDatasets = new PercentageStackedDatasets($this->datasets);

        // Act
        $satisfied = $this->isStacked->isSatisfiedBy($percentageStackedDatasets);

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_a_datasets_instance_is_given(): void
    {
        // Act
        $satisfied = $this->isStacked->isSatisfiedBy($this->datasets);

        // Assert
        $this->assertFalse($satisfied);
    }
}
