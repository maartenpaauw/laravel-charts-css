<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries;

use Maartenpaauw\Chartscss\Data\Entries\EntryContract;
use Maartenpaauw\Chartscss\Data\Entries\NullEntry;
use Maartenpaauw\Chartscss\Tests\TestCase;

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
        $this->assertEquals('-', $this->entry->value()->display());
    }

    /** @test */
    public function it_should_return_zero_as_raw(): void
    {
        $this->assertEquals(0, $this->entry->value()->raw());
    }

    /** @test */
    public function it_should_return_a_empty_declarations_instance_by_default(): void
    {
        $this->assertEmpty($this->entry->value()->declarations()->toString());
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
    public function it_should_return_a_tooltip_without_any_content(): void
    {
        // Act
        $tooltip = $this->entry->tooltip();

        // Assert
        $this->assertEmpty($tooltip->content());
    }
}
