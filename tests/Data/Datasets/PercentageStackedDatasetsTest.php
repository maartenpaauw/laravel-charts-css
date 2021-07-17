<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\CalculatedDataset;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Datasets\PercentageStackedDatasets;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Tests\TestCase;

class PercentageStackedDatasetsTest extends TestCase
{
    private DatasetsContract $percentageStackedDatasets;

    private DatasetsContract $datasets;

    protected function setUp(): void
    {
        parent::setUp();

        $this->datasets = new Datasets(
            new NullAxes(),
            new Dataset([
                new Entry(new Value(20)),
                new Entry(new Value(50)),
            ]),
            new Dataset([
                new Entry(new Value(80)),
                new Entry(new Value(40)),
            ]),
        );

        $this->percentageStackedDatasets = new PercentageStackedDatasets($this->datasets);
    }

    /** @test */
    public function it_should_return_the_origin_axes(): void
    {
        $this->assertEquals($this->datasets->axes(), $this->percentageStackedDatasets->axes());
    }

    /** @test */
    public function it_should_wrap_each_dataset_within_a_calculated_dataset_decorator(): void
    {
        // Act
        [$datasetA, $datasetB] = $this->percentageStackedDatasets->toArray();

        // Assert
        $this->assertInstanceOf(CalculatedDataset::class, $datasetA);
        $this->assertInstanceOf(CalculatedDataset::class, $datasetB);
    }

    /** @test */
    public function it_should_use_the_dataset_sum_for_dividing(): void
    {
        // Act
        [$datasetA, $datasetB] = $this->percentageStackedDatasets->toArray();

        [$entryA, $entryB] = $datasetA->entries();
        [$entryC, $entryD] = $datasetB->entries();

        // Assert
        $this->assertEquals('--size: calc(20 / 70);', $entryA->value()->declarations()->toString());
        $this->assertEquals('--size: calc(50 / 70);', $entryB->value()->declarations()->toString());
        $this->assertEquals('--size: calc(80 / 120);', $entryC->value()->declarations()->toString());
        $this->assertEquals('--size: calc(40 / 120);', $entryD->value()->declarations()->toString());
    }
}
