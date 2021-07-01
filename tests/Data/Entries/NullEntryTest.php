<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries;

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
        $this->assertEmpty($this->entry->declarations()->toString());
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
}
