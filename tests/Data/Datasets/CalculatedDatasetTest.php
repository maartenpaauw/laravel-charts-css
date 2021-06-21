<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Datasets\CalculatedDataset;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\DatasetContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Tests\TestCase;

class CalculatedDatasetTest extends TestCase
{
    private DatasetContract $dataset;

    private DatasetContract $calculatedDataset;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataset = new Dataset([
            new Entry(new Value(10), new Label('A')),
            new Entry(new Value(30), new Label('B')),
            new Entry(new Value(20), new Label('C')),
            new Entry(new Value(40), new Label('D')),
        ]);

        $this->calculatedDataset = new CalculatedDataset($this->dataset, 50);
    }

    /** @test */
    public function it_should_add_the_size_declaration_automatically(): void
    {
        // Act
        [$a, $b, $c, $d] = $this->calculatedDataset->entries();

        // Assert
        $this->assertStringContainsString('--size: calc(10 / 50);', $a->declarations()->toString());
        $this->assertStringContainsString('--size: calc(30 / 50);', $b->declarations()->toString());
        $this->assertStringContainsString('--size: calc(20 / 50);', $c->declarations()->toString());
        $this->assertStringContainsString('--size: calc(40 / 50);', $d->declarations()->toString());
    }

    /** @test */
    public function it_should_return_the_origin_max(): void
    {
        $this->assertEquals($this->dataset->max(), $this->calculatedDataset->max());
    }

    /** @test */
    public function it_should_return_the_origin_label(): void
    {
        $this->assertEquals($this->dataset->label(), $this->calculatedDataset->label());
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
