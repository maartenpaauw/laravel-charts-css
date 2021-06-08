<?php

namespace Maartenpaauw\Chart\Tests\Data;

use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Axes\AxesContract;
use Maartenpaauw\Chart\Tests\TestCase;

class AxesTest extends TestCase
{
    private AxesContract $axes;

    protected function setUp(): void
    {
        parent::setUp();

        $this->axes = new Axes('Month', 'Progress');
    }

    /** @test */
    public function it_should_return_the_data_axis(): void
    {
        // Arrange
        $expectedData = 'Progress';

        // Act
        $data = $this->axes->data();

        // Assert
        $this->assertEquals($expectedData, $data);
    }

    /** @test */
    public function it_should_return_the_primary_axis(): void
    {
        // Arrange
        $expectedPrimary = 'Month';

        // Act
        $primary = $this->axes->primary();

        // Assert
        $this->assertEquals($expectedPrimary, $primary);
    }
}
