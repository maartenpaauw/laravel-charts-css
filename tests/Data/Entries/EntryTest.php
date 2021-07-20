<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Color;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Tooltip\Tooltip;
use Maartenpaauw\Chartscss\Data\Entries\Value\NullValue;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Data\Label\NullLabel;
use Maartenpaauw\Chartscss\Tests\TestCase;

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
        $declarations = $this->entry->value()->declarations();

        // Assert
        $this->assertEmpty($declarations->toString());
    }

    /** @test */
    public function it_should_be_possible_to_receive_the_tooltip(): void
    {
        // Arrange
        $expectedTooltip = new Tooltip('This is a tooltip.');
        $entry = new Entry(new NullValue(), new NullLabel(), $expectedTooltip);

        // Act
        $tooltip = $entry->tooltip();

        // Assert
        $this->assertEquals($expectedTooltip, $tooltip);
    }

    /** @test */
    public function it_should_be_possible_to_set_a_color(): void
    {
        // Arrange
        $color = new Color('red');

        // Act
        $entry = $this->entry->color($color);

        // Assert
        $this->assertEquals('--color: red;', $entry->value()->declarations()->toString());
    }

    /** @test */
    public function it_should_be_possible_to_set_the_start_declaration(): void
    {
        // Act
        $entry = $this->entry->start(10000);

        // Assert
        $this->assertEquals('--start: calc(10000 / 1);', $entry->value()->declarations()->toString());
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
