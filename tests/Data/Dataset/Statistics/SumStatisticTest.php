<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Dataset\Statistics;

use Maartenpaauw\Chartscss\Data\Dataset\Statistics\SumStatistic;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Tests\TestCase;

class SumStatisticTest extends TestCase
{
    /** @test */
    public function it_should_return_the_sum_of_the_given_dataset_entries(): void
    {
        // Arrange
        $expectedResult = 130;

        $dataset = new Dataset([
            new Entry(new Value(30)),
            new Entry(new Value(10)),
            new Entry(new Value(50)),
            new Entry(new Value(40)),
        ]);

        $sumStatistic = new SumStatistic($dataset);

        // Act
        $result = $sumStatistic->result();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
