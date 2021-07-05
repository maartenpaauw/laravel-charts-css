<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries\Value;

use Maartenpaauw\Chartscss\Data\Entries\Value\StartValue;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Tests\TestCase;

class StartValueTest extends TestCase
{
    private ValueContract $value;

    private ValueContract $startValue;

    protected function setUp(): void
    {
        parent::setUp();

        $this->value = new Value(0);
        $this->startValue = new StartValue($this->value, 10);
    }

    /** @test */
    public function it_should_return_the_origin_raw(): void
    {
        $this->assertEquals($this->value->raw(), $this->startValue->raw());
    }

    /** @test */
    public function it_should_return_the_origin_display(): void
    {
        $this->assertEquals($this->value->display(), $this->startValue->display());
    }

    /** @test */
    public function it_should_add_a_start_declaration_to_the_declaration_list(): void
    {
        $this->assertNotEquals($this->value->declarations(), $this->startValue->declarations());
        $this->assertCount(1, $this->startValue->declarations()->toArray());
        $this->assertEquals('--start: calc(10 / 1);', $this->startValue->declarations()->toString());
    }
}
