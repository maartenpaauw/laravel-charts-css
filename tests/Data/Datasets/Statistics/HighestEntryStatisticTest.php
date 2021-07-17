<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets\Statistics;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\Statistics\HighestEntryStatistic;
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

        $datasets = new Datasets(
            new NullAxes(),
            new Dataset([
                new Entry(new Value(30)),
                new Entry(new Value(10)),
                new Entry(new Value(50)),
                new Entry(new Value(40)),
            ]),
            new Dataset([
                new Entry(new Value(10)),
                new Entry(new Value(20)),
                new Entry(new Value(30)),
                new Entry(new Value(40)),
            ])
        );

        $highestEntryStatistic = new HighestEntryStatistic($datasets);

        // Act
        $result = $highestEntryStatistic->result();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
