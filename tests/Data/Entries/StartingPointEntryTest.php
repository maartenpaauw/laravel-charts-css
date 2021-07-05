<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries;

use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\EntryContract;
use Maartenpaauw\Chartscss\Data\Entries\StartingPointEntry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Tests\TestCase;

class StartingPointEntryTest extends TestCase
{
    private EntryContract $origin;

    private EntryContract $startingPointEntry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->origin = new Entry(new Value(10));
        $this->startingPointEntry = new StartingPointEntry(
            $this->origin,
            new Entry(new Value(20)),
            30,
        );
    }

    /** @test */
    public function it_should_return_the_origin_label(): void
    {
        $this->assertEquals($this->origin->label(), $this->startingPointEntry->label());
    }

    /** @test */
    public function it_should_add_the_start_declaration_correctly(): void
    {
        // Act
        $declarations = $this->startingPointEntry->value()->declarations();

        // Assert
        $this->assertStringContainsString('--start: calc(20 / 30);', $declarations->toString());
        $this->assertCount(1, $declarations->toArray());
    }

    /** @test */
    public function it_should_return_the_origin_tooltip(): void
    {
        $this->assertEquals($this->origin->tooltip(), $this->startingPointEntry->tooltip());
    }
}
