<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Label;

use Maartenpaauw\Chartscss\Data\Label\LabelContract;
use Maartenpaauw\Chartscss\Data\Label\NullLabel;
use Maartenpaauw\Chartscss\Tests\TestCase;

class NullLabelTest extends TestCase
{
    private LabelContract $label;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label = new NullLabel();
    }

    /** @test */
    public function it_should_have_an_empty_string_as_value(): void
    {
        $this->assertEmpty($this->label->value());
    }

    /** @test */
    public function it_should_have_no_modifications(): void
    {
        $this->assertEmpty($this->label->modifications()->toArray());
    }

    /** @test */
    public function it_should_have_no_declarations(): void
    {
        $this->assertEmpty($this->label->declarations()->toArray());
    }
}
