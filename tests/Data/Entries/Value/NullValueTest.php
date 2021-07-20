<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries\Value;

use Maartenpaauw\Chartscss\Data\Entries\Value\NullValue;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Tests\TestCase;

class NullValueTest extends TestCase
{
    private ValueContract $value;

    protected function setUp(): void
    {
        parent::setUp();

        $this->value = new NullValue();
    }

    /** @test */
    public function it_should_return_zero_as_raw_value(): void
    {
        $this->assertEquals(0, $this->value->raw());
    }

    /** @test */
    public function it_should_return_zero_as_display_value(): void
    {
        $this->assertEquals('0', $this->value->display());
    }

    /** @test */
    public function it_return_an_empty_declaration_list(): void
    {
        $this->assertEmpty($this->value->declarations()->toArray());
    }
}
