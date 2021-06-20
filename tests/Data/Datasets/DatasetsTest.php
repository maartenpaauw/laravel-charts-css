<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Axes\AxesContract;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Label\Label;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Tests\TestCase;

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
            [
            new Dataset([
                new Entry(new Value(100000)),
                new Entry(new Value(200000)),
            ], new Label('Europe')),
            new Dataset([
                new Entry(new Value(400000)),
                new Entry(new Value(300000)),
            ], new Label('Asia')),
        ]
        );
    }

    /** @test */
    public function it_should_calculate_the_size_correctly(): void
    {
        $this->assertEquals(2, $this->datasets->size());
    }

    /** @test */
    public function it_should_calculate_the_max_data_entry_correctly(): void
    {
        $this->assertEquals(400000, $this->datasets->max());
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
}
