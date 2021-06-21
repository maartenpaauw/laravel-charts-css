<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Data\Datasets\CalculatedDataset;
use Maartenpaauw\Chart\Data\Datasets\CalculatedDatasets;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Tests\TestCase;

class CalculatedDatasetsTest extends TestCase
{
    private DatasetsContract $datasets;

    private DatasetsContract $calculatedDatasets;

    protected function setUp(): void
    {
        parent::setUp();

        $this->datasets = new Datasets(new NullAxes(), [
            new Dataset([
                new Entry(new Value(10)),
                new Entry(new Value(20)),
            ], new Label('A')),
            new Dataset([
                new Entry(new Value(30)),
                new Entry(new Value(40)),
            ], new Label('B')),
        ]);

        $this->calculatedDatasets = new CalculatedDatasets($this->datasets);
    }

    /** @test */
    public function it_should_return_the_origin_size(): void
    {
        $this->assertEquals($this->datasets->size(), $this->calculatedDatasets->size());
    }

    /** @test */
    public function it_should_return_the_origin_max(): void
    {
        $this->assertEquals($this->datasets->max(), $this->calculatedDatasets->max());
    }

    /** @test */
    public function it_should_return_the_origin_axes(): void
    {
        $this->assertEquals($this->datasets->axes(), $this->calculatedDatasets->axes());
    }

    /** @test */
    public function it_should_wrap_each_dataset_within_a_calculated_dataset_decorator(): void
    {
        // Act
        [$a, $b] = $this->calculatedDatasets->toArray();

        // Assert
        $this->assertInstanceOf(CalculatedDataset::class, $a);
        $this->assertInstanceOf(CalculatedDataset::class, $b);
    }
}
