<?php

namespace Maartenpaauw\Chart\Tests\Data\Datasets;

use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Tests\TestCase;

class DatasetTest extends TestCase
{
    private Dataset $dataset;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataset = new Dataset([
            new Entry(new Value(40000)),
            new Entry(new Value(70000)),
        ], new Label('Europe'));
    }

    /** @test */
    public function it_should_return_the_entries_correctly(): void
    {
        $this->assertIsArray($this->dataset->entries());
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

    /** @test */
    public function it_should_be_an_empty_label_by_default(): void
    {
        // Arrange
        $dataset = new Dataset([]);

        // Act
        $label = $dataset->label();

        // Assert
        $this->assertEmpty($label->value());
    }

    /** @test */
    public function it_should_be_possible_to_hide_the_label(): void
    {
        // Act
        $this->dataset->hideLabel();
        $classes = $this->dataset->label()->modifications()->classes();

        // Assert
        $this->assertContains('hide-label', $classes);
    }

    /** @test */
    public function it_should_be_possible_to_align_the_label(): void
    {
        // Act
        $dataset = $this->dataset->alignLabel('end');

        // Assert
        $this->assertNotEquals($this->dataset, $dataset);
        $this->assertEquals('--labels-align: flex-end;', $dataset->label()->declarations()->toString());
    }

    /** @test */
    public function it_should_have_no_entries_by_default(): void
    {
        // Arrange
        $dataset = new Dataset();

        // Act
        $entries = $dataset->entries();

        // Assert
        $this->assertEmpty($entries);
    }
}
