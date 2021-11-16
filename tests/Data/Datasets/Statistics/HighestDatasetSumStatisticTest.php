<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets\Statistics;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\Statistics\HighestDatasetSumStatistic;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use PHPUnit\Framework\TestCase;

class HighestDatasetSumStatisticTest extends TestCase
{
    /** @test */
    public function it_should_return_the_highest_dataset_sum(): void
    {
        // Arrange
        $highestDatasetSumStatistic = new HighestDatasetSumStatistic(
            new Datasets(
                new NullAxes(),
                new Dataset([
                    new Entry(new Value(10)),
                    new Entry(new Value(30)),
                    new Entry(new Value(60)),
                ]),
                new Dataset([
                    new Entry(new Value(50)),
                    new Entry(new Value(20)),
                    new Entry(new Value(10)),
                ]),
            ),
        );

        // Act
        $result = $highestDatasetSumStatistic->result();

        // Assert
        $this->assertEquals(100, $result);
    }

    /** @test */
    public function it_should_return_zero_when_there_are_no_datasets(): void
    {
        // Arrange
        $highestDatasetSumStatistic = new HighestDatasetSumStatistic(new Datasets(new NullAxes()));

        // Act
        $result = $highestDatasetSumStatistic->result();

        // Assert
        $this->assertEquals(0, $result);
    }
}
