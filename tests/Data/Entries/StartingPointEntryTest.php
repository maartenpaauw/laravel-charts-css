<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Data\Entries\StartingPointEntry;
use Maartenpaauw\Chart\Tests\TestCase;

class StartingPointEntryTest extends TestCase
{
    private EntryContract $origin;

    private EntryContract $previous;

    private EntryContract $entry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->origin = new Entry(10);
        $this->previous = new Entry(20);
        $this->entry = new StartingPointEntry($this->origin, $this->previous);
    }

    /** @test */
    public function it_should_return_the_origin_value(): void
    {
        $this->assertEquals($this->origin->value(), $this->entry->value());
    }

    /** @test */
    public function it_should_return_the_origin_raw_value(): void
    {
        $this->assertEquals($this->origin->raw(), $this->entry->raw());
    }

    /** @test */
    public function it_should_return_the_previous_raw_value_as_start_value(): void
    {
        $this->assertEquals($this->previous->raw(), $this->entry->start());
    }

    /** @test */
    public function it_should_return_the_origin_label(): void
    {
        $this->assertEquals($this->origin->label(), $this->entry->label());
    }

    /** @test */
    public function it_should_return_the_origin_declarations(): void
    {
        $this->assertEquals($this->origin->declarations(), $this->entry->declarations());
    }

    /** @test */
    public function it_should_add_the_given_color_to_its_origin_declarations_bag(): void
    {
        // Arrange
        $color = new Color('red');

        // Act
        $this->entry->color($color);

        // Assert
        $this->assertEquals('--color: red;', $this->origin->declarations()->toString());
    }

    /** @test */
    public function it_should_hide_modify_the_origin_label_when_hiding_it(): void
    {
        // Arrange

        // Act
        $this->entry->hideLabel();

        $modifications = $this->origin->label()->modifications();

        // Assert
        $this->assertCount(1, $modifications->toArray());
        $this->assertContains('hide-label', $modifications->classes());
    }
}
