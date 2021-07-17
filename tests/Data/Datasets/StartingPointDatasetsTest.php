<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Datasets\StartingPointDataset;
use Maartenpaauw\Chartscss\Data\Datasets\StartingPointDatasets;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Tests\TestCase;

class StartingPointDatasetsTest extends TestCase
{
    private DatasetsContract $datasets;

    private DatasetsContract $startingPointDatasets;

    protected function setUp(): void
    {
        parent::setUp();

        $this->datasets = new Datasets(
            new Axes('Dataset', 'Value'),
            new Dataset([
                new Entry(new Value(10)),
                new Entry(new Value(20)),
            ], new Label('Dataset #1')),
            new Dataset([
                new Entry(new Value(30)),
                new Entry(new Value(40)),
            ], new Label('Dataset #2')),
        );

        $this->startingPointDatasets = new StartingPointDatasets($this->datasets);
    }

    /** @test */
    public function it_should_return_the_axes_of_the_origin_datasets(): void
    {
        $this->assertEquals($this->datasets->axes(), $this->startingPointDatasets->axes());
    }

    /** @test */
    public function it_should_wrap_each_dataset_within_a_starting_point_dataset(): void
    {
        // Act
        [$a, $b] = $this->startingPointDatasets->toArray();

        // Assert
        $this->assertInstanceOf(StartingPointDataset::class, $a);
        $this->assertInstanceOf(StartingPointDataset::class, $b);
    }

    /** @test */
    public function it_should_use_the_highest_entry_of_all_datasets_for_dividing(): void
    {
        // Act
        [$datasetA, $datasetB] = $this->startingPointDatasets->toArray();

        [$entryA, $entryB] = $datasetA->entries();
        [$entryC, $entryD] = $datasetB->entries();

        // Assert
        $this->assertEmpty($entryA->value()->declarations()->toString());
        $this->assertEquals('--start: calc(10 / 40);', $entryB->value()->declarations()->toString());
        $this->assertEmpty($entryC->value()->declarations()->toString());
        $this->assertEquals('--start: calc(30 / 40);', $entryD->value()->declarations()->toString());
    }
}
