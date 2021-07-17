<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\CalculatedDataset;
use Maartenpaauw\Chartscss\Data\Datasets\CalculatedDatasets;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Tests\TestCase;

class CalculatedDatasetsTest extends TestCase
{
    private DatasetsContract $datasets;

    private DatasetsContract $calculatedDatasets;

    protected function setUp(): void
    {
        parent::setUp();

        $this->datasets = new Datasets(
            new NullAxes(),
            new Dataset([
                new Entry(new Value(10)),
                new Entry(new Value(20)),
            ], new Label('A')),
            new Dataset([
                new Entry(new Value(30)),
                new Entry(new Value(40)),
            ], new Label('B')),
        );

        $this->calculatedDatasets = new CalculatedDatasets($this->datasets);
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

    /** @test */
    public function it_should_use_the_maximum_entry_for_dividing(): void
    {
        // Act
        [$datasetA, $datasetB] = $this->calculatedDatasets->toArray();

        [$entryA, $entryB] = $datasetA->entries();
        [$entryC, $entryD] = $datasetB->entries();

        // Assert
        $this->assertEquals('--size: calc(10 / 40);', $entryA->value()->declarations()->toString());
        $this->assertEquals('--size: calc(20 / 40);', $entryB->value()->declarations()->toString());
        $this->assertEquals('--size: calc(30 / 40);', $entryC->value()->declarations()->toString());
        $this->assertEquals('--size: calc(40 / 40);', $entryD->value()->declarations()->toString());
    }
}
