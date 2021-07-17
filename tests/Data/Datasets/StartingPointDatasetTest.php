<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetContract;
use Maartenpaauw\Chartscss\Data\Datasets\StartingPointDataset;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\StartingPointEntry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Statistics\CustomStatistic;
use Maartenpaauw\Chartscss\Tests\TestCase;

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

        $this->startingPointDataset = new StartingPointDataset(
            $this->dataset,
            new CustomStatistic(50),
        );
    }

    /** @test */
    public function it_should_return_the_label_of_the_origin_dataset(): void
    {
        $this->assertEquals($this->dataset->label(), $this->startingPointDataset->label());
    }

    /** @test */
    public function it_should_return_an_empty_array_when_no_entries_defined(): void
    {
        // Arrange
        $startingPointDataset = new StartingPointDataset(
            new Dataset(),
            new CustomStatistic(10),
        );

        // Act
        $entries = $startingPointDataset->entries();

        // Assert
        $this->assertEmpty($entries);
    }

    /** @test */
    public function it_should_not_wrap_the_first_entry_within_a_starting_point_entry_decorator(): void
    {
        // Arrange
        $startingPointDataset = new StartingPointDataset(
            new Dataset([
                new Entry(new Value(20)),
            ]),
            new CustomStatistic(10),
        );

        // Act
        [$first] = $entries = $startingPointDataset->entries();

        // Assert
        $this->assertInstanceOf(Entry::class, $first);
        $this->assertCount(1, $entries);
    }

    /** @test */
    public function it_should_wrap_all_except_the_first_entry_within_a_starting_point_entry_decorator(): void
    {
        // Act
        [$entryA, $startingPointEntryB, $startingPointEntryC] = $entries = $this->startingPointDataset->entries();

        // Assert
        $this->assertInstanceOf(Entry::class, $entryA);
        $this->assertInstanceOf(StartingPointEntry::class, $startingPointEntryB);
        $this->assertInstanceOf(StartingPointEntry::class, $startingPointEntryC);
        $this->assertCount(3, $entries);
    }

    /** @test */
    public function it_should_calculate_the_starting_points_correctly(): void
    {
        // Act
        [$a, $b, $c] = $this->startingPointDataset->entries();

        // Assert
        $this->assertEmpty($a->value()->declarations()->toString());
        $this->assertEquals('--start: calc(10 / 50);', $b->value()->declarations()->toString());
        $this->assertEquals('--start: calc(20 / 50);', $c->value()->declarations()->toString());
    }
}
