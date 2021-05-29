<?php

namespace Maartenpaauw\Chart\Tests\Data;

use Maartenpaauw\Chart\Data\CalculatedDataset;
use Maartenpaauw\Chart\Data\Dataset;
use Maartenpaauw\Chart\Data\DatasetContract;
use Maartenpaauw\Chart\Data\Entry;
use Maartenpaauw\Chart\Tests\TestCase;

class CalculatedDatasetTest extends TestCase
{
    private DatasetContract $dataset;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataset = new CalculatedDataset(new Dataset([
            new Entry('$40k', 40000),
            new Entry('$70k', 70000),
        ]));
    }

    /** @test */
    public function it_should_return_the_entries_correctly(): void
    {
        $this->assertCount(2, $this->dataset->entries());
    }

    /** @test */
    public function it_should_calculate_the_max_entry_correctly(): void
    {
        $this->assertEquals(70000, $this->dataset->max());
    }
}
