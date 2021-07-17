<?php

namespace Maartenpaauw\Chartscss\Tests\Statistics;

use Maartenpaauw\Chartscss\Statistics\CustomStatistic;
use Maartenpaauw\Chartscss\Tests\TestCase;

class CustomStatisticTest extends TestCase
{
    private CustomStatistic $customStatistic;

    protected function setUp(): void
    {
        parent::setUp();

        $this->customStatistic = new CustomStatistic(10);
    }

    /** @test */
    public function it_should_return_the_given_value_correctly(): void
    {
        // Arrange
        $expectedResult = 10;

        // Act
        $result = $this->customStatistic->result();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
