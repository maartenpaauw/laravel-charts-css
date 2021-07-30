<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Dataset\Statistics;

use Maartenpaauw\Chartscss\Data\Dataset\Statistics\HighestEntryStatistic;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Tests\TestCase;

class HighestEntryStatisticTest extends TestCase
{
    /** @test */
    public function it_should_return_the_highest_entry_of_a_given_dataset(): void
    {
        // Arrange
        $expectedResult = 50;

        $dataset = new Dataset([
            new Entry(new Value(30)),
            new Entry(new Value(10)),
            new Entry(new Value(50)),
            new Entry(new Value(40)),
        ]);

        $highestEntryStatistic = new HighestEntryStatistic($dataset);

        // Act
        $result = $highestEntryStatistic->result();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /** @test */
    public function it_should_return_zero_when_empty_datasets_are_configured(): void
    {
        // Arrange
        $highestEntryStatistic = new HighestEntryStatistic(new Dataset());

        // Act
        $result = $highestEntryStatistic->result();

        // Assert
        $this->assertEquals(0, $result);
    }
}
