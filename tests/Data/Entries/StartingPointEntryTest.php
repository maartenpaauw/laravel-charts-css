<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries;

use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Data\Entries\StartingPointEntry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Tests\TestCase;

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
}
