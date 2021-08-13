<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Datasets\InvertedDatasets;
use Maartenpaauw\Chartscss\Data\Entries\NullEntry;
use Maartenpaauw\Chartscss\Tests\TestCase;

class InvertedDatasetsTest extends TestCase
{
    private DatasetsContract $datasets;

    private DatasetsContract $invertedDatasets;

    protected function setUp(): void
    {
        $this->datasets = new Datasets(
            new NullAxes(),
            new Dataset(),
        );

        $this->invertedDatasets = new InvertedDatasets($this->datasets);

        parent::setUp();
    }

    /** @test */
    public function it_should_return_the_origin_axes(): void
    {
        $this->assertEquals($this->datasets->axes(), $this->invertedDatasets->axes());
    }

    /** @test */
    public function it_should_not_touch_the_datasets_when_only_one_is_passed(): void
    {
        $this->assertEquals($this->datasets->toArray(), $this->invertedDatasets->toArray());
    }

    /** @test */
    public function it_should_inverse_the_origin_datasets_correctly(): void
    {
        // Arrange
        $entry1 = new NullEntry();
        $entry2 = new NullEntry();
        $entry3 = new NullEntry();
        $entry4 = new NullEntry();
        $entry5 = new NullEntry();
        $entry6 = new NullEntry();
        $entry7 = new NullEntry();
        $entry8 = new NullEntry();
        $entry9 = new NullEntry();

        $invertedDatasets = new InvertedDatasets(
            new Datasets(
                new NullAxes(),
                new Dataset([$entry1, $entry2, $entry3]),
                new Dataset([$entry4, $entry5, $entry6]),
                new Dataset([$entry7, $entry8, $entry9]),
            ),
        );

        // Act
        [$dataset1, $dataset2, $dataset3] = $datasets = $invertedDatasets->toArray();

        // Assert
        $this->assertCount(3, $datasets);

        $this->assertCount(3, $dataset1->entries());
        $this->assertCount(3, $dataset2->entries());
        $this->assertCount(3, $dataset3->entries());

        $this->assertContains($entry1, $dataset1->entries());
        $this->assertContains($entry4, $dataset1->entries());
        $this->assertContains($entry7, $dataset1->entries());

        $this->assertContains($entry2, $dataset2->entries());
        $this->assertContains($entry5, $dataset2->entries());
        $this->assertContains($entry8, $dataset2->entries());

        $this->assertContains($entry3, $dataset3->entries());
        $this->assertContains($entry6, $dataset3->entries());
        $this->assertContains($entry9, $dataset3->entries());
    }

    /** @test */
    public function it_should_automatically_add_more_datasets_to_the_array_when_needed(): void
    {

        // Arrange
        $entry1 = new NullEntry();
        $entry2 = new NullEntry();
        $entry3 = new NullEntry();
        $entry4 = new NullEntry();
        $entry5 = new NullEntry();
        $entry6 = new NullEntry();

        $invertedDatasets = new InvertedDatasets(
            new Datasets(
                new NullAxes(),
                new Dataset([$entry1, $entry2, $entry3]),
                new Dataset([$entry4, $entry5, $entry6]),
            ),
        );

        // Act
        [$dataset1, $dataset2, $dataset3] = $datasets = $invertedDatasets->toArray();

        // Assert
        $this->assertCount(3, $datasets);

        $this->assertCount(2, $dataset1->entries());
        $this->assertCount(2, $dataset2->entries());
        $this->assertCount(2, $dataset3->entries());

        $this->assertContains($entry1, $dataset1->entries());
        $this->assertContains($entry4, $dataset1->entries());

        $this->assertContains($entry2, $dataset2->entries());
        $this->assertContains($entry5, $dataset2->entries());

        $this->assertContains($entry3, $dataset3->entries());
        $this->assertContains($entry6, $dataset3->entries());
    }
}
