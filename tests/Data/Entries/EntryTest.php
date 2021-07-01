<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Tests\TestCase;

class EntryTest extends TestCase
{
    private Entry $entry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->entry = new Entry(new Value(40000));
    }

    /** @test */
    public function it_should_return_the_value_correctly(): void
    {
        $this->assertEquals('40000', $this->entry->value()->display());
    }

    /** @test */
    public function it_should_return_the_raw_value_correctly(): void
    {
        $this->assertEquals(40000, $this->entry->value()->raw());
    }

    /** @test */
    public function it_should_return_the_raw_value_as_start_value(): void
    {
        $this->assertEquals($this->entry->value()->raw(), $this->entry->value()->display());
    }

    /** @test */
    public function it_should_be_an_empty_label_if_none_is_specified(): void
    {
        // Arrange
        $entry = new Entry(new Value(10));

        // Act
        $label = $entry->label();

        // Assert
        $this->assertEmpty($label->value());
    }

    /** @test */
    public function it_should_be_possible_to_define_a_label(): void
    {
        // Arrange
        $ExpectedLabel = 'Kilo';
        $entry = new Entry(new Value(1000), new Label('Kilo'));

        // Act
        $value = $entry->label()->value();

        // Assert
        $this->assertEquals($ExpectedLabel, $value);
    }

    /** @test */
    public function it_should_return_an_empty_declarations_instance_by_default(): void
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
    public function it_should_be_possible_to_set_the_start_declaration(): void
    {
        // Act
        $this->entry->start(10000);

        // Assert
        $this->assertEquals('--start: calc(10000 / 1);', $this->entry->declarations()->toString());
    }

    /** @test */
    public function it_should_be_possible_to_hide_the_label(): void
    {
        // Act
        $entry = $this->entry->hideLabel();

        $modifications = $entry->label()->modifications();

        // Assert
        $this->assertCount(1, $modifications->toArray());
        $this->assertContains('hide-label', $modifications->classes());
    }

    /** @test */
    public function it_should_be_possible_to_align_the_label(): void
    {
        // Act
        $entry = $this->entry->alignLabel('center');

        // Assert
        $this->assertNotEquals($this->entry, $entry);
        $this->assertEquals('--labels-align: center;', $entry->label()->declarations()->toString());
    }
}
