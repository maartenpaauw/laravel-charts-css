<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries\Value;

use Maartenpaauw\Chart\Data\Entries\Value\SizedValue;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Tests\TestCase;

class SizedValueTest extends TestCase
{
    private ValueContract $value;

    private ValueContract $sizedValue;

    protected function setUp(): void
    {
        parent::setUp();

        $this->value = new Value(10);
        $this->sizedValue = new SizedValue($this->value, 20);
    }

    /** @test */
    public function it_should_return_the_origin_raw(): void
    {
        $this->assertEquals($this->value->raw(), $this->sizedValue->raw());
    }

    /** @test */
    public function it_should_return_the_origin_display(): void
    {
        $this->assertEquals($this->value->display(), $this->sizedValue->display());
    }

    /** @test */
    public function it_should_add_a_size_declaration_to_the_declaration_list(): void
    {
        $this->assertNotEquals($this->value->declarations(), $this->sizedValue->declarations());
        $this->assertCount(1, $this->sizedValue->declarations()->toArray());
        $this->assertEquals('--size: calc(10 / 20);', $this->sizedValue->declarations()->toString());
    }
}
