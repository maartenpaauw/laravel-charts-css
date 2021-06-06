<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\DatasetContract;
use Maartenpaauw\Chart\Data\Datasets\StartingPointDataset;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\NullEntry;
use Maartenpaauw\Chart\Data\Entries\StartingPointEntry;
use Maartenpaauw\Chart\Tests\TestCase;

class StartingPointDatasetTest extends TestCase
{
    private DatasetContract $dataset;

    private DatasetContract $startingPointDataset;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataset = new Dataset([
            new Entry('10', 10),
            new Entry('20', 20),
            new Entry('30', 30),
        ], 'Dataset #1');

        $this->startingPointDataset = new StartingPointDataset($this->dataset);
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
    public function it_should_wrap_each_entry_within_a_starting_point_entry_decorator(): void
    {
        // Act
        [$entryA, $entryB, $entryC] = $this->dataset->entries();
        [$startingPointEntryA, $startingPointEntryB, $startingPointEntryC] = $this->startingPointDataset->entries();

        // Assert
        $this->assertInstanceOf(StartingPointEntry::class, $startingPointEntryA);
        $this->assertInstanceOf(StartingPointEntry::class, $startingPointEntryB);
        $this->assertInstanceOf(StartingPointEntry::class, $startingPointEntryC);

        $this->assertEquals($entryA->value(), $startingPointEntryA->value());
        $this->assertEquals($entryB->value(), $startingPointEntryB->value());
        $this->assertEquals($entryC->value(), $startingPointEntryC->value());

        $this->assertEquals($entryA->raw(), $startingPointEntryA->raw());
        $this->assertEquals($entryB->raw(), $startingPointEntryB->raw());
        $this->assertEquals($entryC->raw(), $startingPointEntryC->raw());

        $this->assertEquals((new NullEntry())->raw(), $startingPointEntryA->start());
        $this->assertEquals($entryA->raw(), $startingPointEntryB->start());
        $this->assertEquals($entryB->raw(), $startingPointEntryC->start());
    }
}
