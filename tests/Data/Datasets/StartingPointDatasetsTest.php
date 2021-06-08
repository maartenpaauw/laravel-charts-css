<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Datasets\StartingPointDataset;
use Maartenpaauw\Chart\Data\Datasets\StartingPointDatasets;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Tests\TestCase;

class StartingPointDatasetsTest extends TestCase
{
    private DatasetsContract $datasets;

    private DatasetsContract $startingPointDatasets;

    protected function setUp(): void
    {
        parent::setUp();

        $this->datasets = new Datasets(
            new Axes('Dataset', 'Value'),
            [
                new Dataset([
                    new Entry('10', 10),
                    new Entry('20', 20),
                ], 'Dataset #1'),
                new Dataset([
                    new Entry('10', 10),
                    new Entry('20', 20),
                ], 'Dataset #2'),
            ],
        );

        $this->startingPointDatasets = new StartingPointDatasets($this->datasets);
    }

    /** @test */
    public function it_should_return_the_size_of_the_origin_datasets(): void
    {
        $this->assertEquals($this->datasets->size(), $this->startingPointDatasets->size());
    }

    /** @test */
    public function it_should_return_the_max_of_the_origin_datasets(): void
    {
        $this->assertEquals($this->datasets->max(), $this->startingPointDatasets->max());
    }

    /** @test */
    public function it_should_return_the_axes_of_the_origin_datasets(): void
    {
        $this->assertEquals($this->datasets->axes(), $this->startingPointDatasets->axes());
    }

    /** @test */
    public function it_should_wrap_each_dataset_within_a_starting_point_dataset(): void
    {
        foreach ($this->startingPointDatasets->toArray() as $dataset) {
            $this->assertInstanceOf(StartingPointDataset::class, $dataset);
        }
    }
}
