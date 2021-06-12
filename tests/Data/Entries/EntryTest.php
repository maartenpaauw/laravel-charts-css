<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Tests\TestCase;

class EntryTest extends TestCase
{
    private EntryContract $entry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->entry = new Entry(40000);
    }

    /** @test */
    public function it_should_return_the_value_correctly(): void
    {
        $this->assertEquals('40000', $this->entry->value());
    }

    /** @test */
    public function it_should_return_the_raw_value_correctly(): void
    {
        $this->assertEquals(40000, $this->entry->raw());
    }

    /** @test */
    public function it_should_return_the_raw_value_as_start_value(): void
    {
        $this->assertEquals($this->entry->raw(), $this->entry->value());
    }

    /** @test */
    public function it_should_be_possible_to_define_a_label(): void
    {
        // Arrange
        $ExpectedLabel = 'Kilo';
        $entry = new Entry(1000, 'Kilo');

        // Act
        $value = $entry->label()->value();

        // Assert
        $this->assertEquals($ExpectedLabel, $value);
    }

    /** @test */
    public function it_should_return_an_empty_declarations_bag_by_default(): void
    {
        // Act
        $declarations = $this->entry->declarations();

        // Assert
        $this->assertEmpty($declarations->toString());
    }

    /** @test */
    public function it_should_be_possible_to_set_a_color(): void
    {
        // Arrange
        $color = new Color('red');

        // Act
        $this->entry->color($color);

        // Assert
        $this->assertEquals('--color: red;', $this->entry->declarations()->toString());
    }

    /** @test */
    public function it_should_be_possible_to_hide_the_label(): void
    {
        // Act
        $this->entry->hideLabel();

        $modifications = $this->entry->label()->modifications();

        // Assert
        $this->assertCount(1, $modifications->toArray());
        $this->assertContains('hide-label', $modifications->classes());
    }
}
