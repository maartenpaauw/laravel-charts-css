<?php

namespace Maartenpaauw\Chart\Tests\Data;

use Maartenpaauw\Chart\Data\Entry;
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
}
