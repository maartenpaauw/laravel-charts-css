<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Axes;

use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Axes\AxesContract;
use Maartenpaauw\Chartscss\Tests\TestCase;

class AxesTest extends TestCase
{
    private AxesContract $axes;

    protected function setUp(): void
    {
        parent::setUp();

        $this->axes = new Axes('Month', ['Januari', 'Februari']);
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

    /** @test */
    public function it_should_return_the_data_axis(): void
    {
        // Arrange
        $expectedData = ['Januari', 'Februari'];

        // Act
        $data = $this->axes->data();

        // Assert
        $this->assertEquals($expectedData, $data);
    }

    /** @test */
    public function it_should_cast_a_single_data_axis_to_an_array(): void
    {
        // Arrange
        $axes = new Axes('Month', 'Januari');

        // Act
        $data = $axes->data();

        // Assert
        $this->assertCount(1, $data);
        $this->assertContains('Januari', $data);
    }
}
