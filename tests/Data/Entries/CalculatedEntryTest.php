<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries;

use Maartenpaauw\Chartscss\Data\Entries\CalculatedEntry;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\EntryContract;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Tests\TestCase;

class CalculatedEntryTest extends TestCase
{
    private EntryContract $origin;

    private EntryContract $calculatedEntry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->origin = new Entry(new Value(10));
        $this->calculatedEntry = new CalculatedEntry(
            $this->origin,
            30,
        );
    }

    /** @test */
    public function it_should_add_the_size_declaration_correctly(): void
    {
        // Act
        $declarations = $this->calculatedEntry->value()->declarations();

        // Assert
        $this->assertStringContainsString('--size: calc(10 / 30);', $declarations->toString());
    }

    /** @test */
    public function it_should_return_the_origin_label(): void
    {
        $this->assertEquals($this->origin->label(), $this->calculatedEntry->label());
    }

    /** @test */
    public function it_should_return_the_origin_tooltip(): void
    {
        $this->assertEquals($this->origin->tooltip(), $this->calculatedEntry->tooltip());
    }
}
