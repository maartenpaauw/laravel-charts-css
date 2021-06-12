<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Datasets\CalculatedDataset;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\DatasetContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Tests\TestCase;

class CalculatedDatasetTest extends TestCase
{
    private DatasetContract $dataset;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataset = new CalculatedDataset(new Dataset([
            new Entry(40000),
            new Entry(70000),
        ], 'Europe'));
    }

    /** @test */
    public function it_should_return_the_entries_correctly(): void
    {
        $this->assertCount(2, $this->dataset->entries());
    }

    public function it_should_return_the_label_correctly(): void
    {
        $this->assertEquals('Europe', $this->dataset->label());
    }

    /** @test */
    public function it_should_calculate_the_max_entry_correctly(): void
    {
        $this->assertEquals(70000, $this->dataset->max());
    }
}
