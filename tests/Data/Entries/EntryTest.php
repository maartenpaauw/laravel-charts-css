<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Tests\TestCase;

class EntryTest extends TestCase
{
    private Entry $entry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->entry = new Entry('$40k', 40000);
    }

    /** @test */
    public function it_should_return_the_value_correctly(): void
    {
        $this->assertEquals('$40k', $this->entry->value());
    }

    /** @test */
    public function it_should_return_the_raw_value_correctly(): void
    {
        $this->assertEquals(40000, $this->entry->raw());
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
}
