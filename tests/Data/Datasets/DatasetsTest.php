<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Axes\AxesContract;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Tests\TestCase;

class DatasetsTest extends TestCase
{
    private DatasetsContract $datasets;

    private AxesContract $axes;

    protected function setUp(): void
    {
        parent::setUp();

        $this->axes = new Axes('Continent', 'Salary');

        $this->datasets = new Datasets(
            $this->axes,
            new Dataset([
                new Entry(new Value(100000)),
                new Entry(new Value(200000)),
            ], new Label('Europe')),
            new Dataset([
                new Entry(new Value(400000)),
                new Entry(new Value(300000)),
            ], new Label('Asia')),
        );
    }

    /** @test */
    public function it_should_be_possible_to_retrieve_the_axes(): void
    {
        $this->assertEquals($this->axes, $this->datasets->axes());
    }

    /** @test */
    public function it_should_return_an_array_correctly(): void
    {
        $this->assertIsArray($this->datasets->toArray());
        $this->assertCount(2, $this->datasets->toArray());
    }

    /** @test */
    public function it_should_be_an_empty_array_by_default(): void
    {
        // Arrange
        $datasets = new Datasets($this->axes);

        // Assert
        $this->assertEmpty($datasets->toArray());
    }
}
