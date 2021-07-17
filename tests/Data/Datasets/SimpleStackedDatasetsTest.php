<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\CalculatedDataset;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Datasets\SimpleStackedDatasets;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Tests\TestCase;

class SimpleStackedDatasetsTest extends TestCase
{
    private DatasetsContract $datasets;

    private DatasetsContract $simpleStackedDatasets;

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

        $this->simpleStackedDatasets = new SimpleStackedDatasets($this->datasets);
    }

    /** @test */
    public function it_should_return_the_origin_axes(): void
    {
        $this->assertEquals($this->datasets->axes(), $this->simpleStackedDatasets->axes());
    }

    /** @test */
    public function it_should_wrap_each_dataset_within_a_calculated_dataset_decorator(): void
    {
        // Act
        [$datasetA, $datasetB] = $this->simpleStackedDatasets->toArray();

        // Assert
        $this->assertInstanceOf(CalculatedDataset::class, $datasetA);
        $this->assertInstanceOf(CalculatedDataset::class, $datasetB);
    }

    /** @test */
    public function it_should_use_the_highest_dataset_sum_for_dividing(): void
    {
        // Act
        [$datasetA, $datasetB] = $this->simpleStackedDatasets->toArray();

        [$entryA, $entryB] = $datasetA->entries();
        [$entryC, $entryD] = $datasetB->entries();

        // Assert
        $this->assertEquals('--size: calc(20 / 120);', $entryA->value()->declarations()->toString());
        $this->assertEquals('--size: calc(50 / 120);', $entryB->value()->declarations()->toString());
        $this->assertEquals('--size: calc(80 / 120);', $entryC->value()->declarations()->toString());
        $this->assertEquals('--size: calc(40 / 120);', $entryD->value()->declarations()->toString());
    }
}
