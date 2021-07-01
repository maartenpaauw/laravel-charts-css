<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\DatasetContract;
use Maartenpaauw\Chart\Data\Datasets\StartingPointDataset;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\StartingPointEntry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Tests\TestCase;

class StartingPointDatasetTest extends TestCase
{
    private DatasetContract $dataset;

    private DatasetContract $startingPointDataset;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataset = new Dataset([
            new Entry(new Value(10)),
            new Entry(new Value(20)),
            new Entry(new Value(30)),
        ], new Label('Dataset #1'));

        $this->startingPointDataset = new StartingPointDataset($this->dataset, 50);
    }

    /** @test */
    public function it_should_return_the_label_of_the_origin_dataset(): void
    {
        $this->assertEquals($this->dataset->label(), $this->startingPointDataset->label());
    }

    /** @test */
    public function it_should_return_the_max_from_the_origin_dataset(): void
    {
        $this->assertEquals($this->dataset->max(), $this->startingPointDataset->max());
    }

    /** @test */
    public function it_should_wrap_all_except_the_first_entry_within_a_starting_point_entry_decorator(): void
    {
        // Act
        [$entryA, $startingPointEntryB, $startingPointEntryC] = $this->startingPointDataset->entries();

        // Assert
        $this->assertInstanceOf(Entry::class, $entryA);
        $this->assertInstanceOf(StartingPointEntry::class, $startingPointEntryB);
        $this->assertInstanceOf(StartingPointEntry::class, $startingPointEntryC);
    }
}
