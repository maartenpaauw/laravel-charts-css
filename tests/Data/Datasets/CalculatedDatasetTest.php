<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Datasets\CalculatedDataset;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\DatasetContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Tests\TestCase;

class CalculatedDatasetTest extends TestCase
{
    private DatasetContract $calculatedDataset;

    private DatasetContract $dataset;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataset = new Dataset([
            new Entry(40000),
            new Entry(70000),
        ], 'Europe');

        $this->calculatedDataset = new CalculatedDataset($this->dataset);
    }

    /** @test */
    public function it_should_return_the_origin_entries(): void
    {
        $this->assertEquals($this->dataset->entries(), $this->calculatedDataset->entries());
    }

    /** @test */
    public function it_should_return_the_label_of_the_origin_dataset(): void
    {
        $this->assertEquals($this->dataset->label(), $this->calculatedDataset->label());
    }

    /** @test */
    public function it_should_calculate_the_max_entry_correctly(): void
    {
        $this->assertEquals(70000, $this->calculatedDataset->max());
    }

    /** @test */
    public function it_should_be_possible_to_hide_the_label(): void
    {
        // Act
        $dataset = $this->calculatedDataset->hideLabel();

        // Assert
        $this->assertCount(1, $dataset->label()->modifications()->toArray());
        $this->assertInstanceOf(CalculatedDataset::class, $dataset);
    }
}
