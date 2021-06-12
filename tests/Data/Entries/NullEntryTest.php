<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Data\Entries\NullEntry;
use Maartenpaauw\Chart\Tests\TestCase;

class NullEntryTest extends TestCase
{
    private EntryContract $entry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->entry = new NullEntry();
    }

    /** @test */
    public function it_should_return_a_dash_as_value(): void
    {
        $this->assertEquals('-', $this->entry->value());
    }

    /** @test */
    public function it_should_return_zero_as_raw(): void
    {
        $this->assertEquals(0, $this->entry->raw());
    }

    /** @test */
    public function it_should_return_zero_as_start(): void
    {
        $this->assertEquals(0, $this->entry->start());
    }

    /** @test */
    public function it_should_return_a_empty_declarations_bag_by_default(): void
    {
        $this->assertEmpty($this->entry->declarations()->toString());
    }

    /** @test */
    public function it_should_not_do_anything_with_the_given_color(): void
    {
        // Arrange
        $color = new Color('red');

        // Act
        $this->entry->color($color);

        // Assert
        $this->assertEmpty($this->entry->declarations()->toArray());
    }

    /** @test */
    public function it_should_use_as_dash_as_label(): void
    {
        // Arrange
        $expectedLabel = '-';

        // Act
        $label = $this->entry->label()->value();

        // Assert
        $this->assertEquals($expectedLabel, $label);
    }

    /** @test */
    public function it_should_not_be_possible_to_hide_the_label(): void
    {
        // Act
        $this->entry->hideLabel();

        // Assert
        $this->assertEmpty($this->entry->label()->modifications()->toArray());
    }
}
