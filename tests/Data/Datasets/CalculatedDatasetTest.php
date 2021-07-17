<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Datasets\CalculatedDataset;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetContract;
use Maartenpaauw\Chartscss\Data\Entries\CalculatedEntry;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Statistics\CustomStatistic;
use Maartenpaauw\Chartscss\Tests\TestCase;

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

        $this->calculatedDataset = new CalculatedDataset(
            $this->dataset,
            new CustomStatistic(50),
        );
    }

    /** @test */
    public function it_should_add_the_size_declaration_automatically(): void
    {
        // Act
        [$a, $b, $c, $d] = $this->calculatedDataset->entries();

        // Assert
        $this->assertStringContainsString('--size: calc(10 / 50);', $a->value()->declarations()->toString());
        $this->assertStringContainsString('--size: calc(30 / 50);', $b->value()->declarations()->toString());
        $this->assertStringContainsString('--size: calc(20 / 50);', $c->value()->declarations()->toString());
        $this->assertStringContainsString('--size: calc(40 / 50);', $d->value()->declarations()->toString());
    }

    /** @test */
    public function it_should_wrap_each_entry_within_a_calculated_entry_decorator(): void
    {
        // Act
        [$a, $b, $c, $d] = $this->calculatedDataset->entries();

        // Assert
        $this->assertInstanceOf(CalculatedEntry::class, $a);
        $this->assertInstanceOf(CalculatedEntry::class, $b);
        $this->assertInstanceOf(CalculatedEntry::class, $c);
        $this->assertInstanceOf(CalculatedEntry::class, $d);
    }

    /** @test */
    public function it_should_return_the_origin_label(): void
    {
        $this->assertEquals($this->dataset->label(), $this->calculatedDataset->label());
    }
}
