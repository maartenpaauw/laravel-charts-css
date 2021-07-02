<?php

namespace Maartenpaauw\Chart\Tests\Data\Label;

use Maartenpaauw\Chart\Data\Label\AlignedLabel;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Data\Label\NullLabel;
use Maartenpaauw\Chart\Tests\TestCase;

class AlignedLabelTest extends TestCase
{
    private LabelContract $label;

    private LabelContract $alignedLabel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label = new NullLabel();
        $this->alignedLabel = new AlignedLabel($this->label, 'center');
    }

    /** @test */
    public function it_should_return_the_origin_value(): void
    {
        $this->assertEquals($this->label->value(), $this->alignedLabel->value());
    }

    /** @test */
    public function it_should_return_the_origin_modifications(): void
    {
        $this->assertEquals($this->label->modifications(), $this->alignedLabel->modifications());
    }

    /** @test */
    public function it_should_add_the_given_alignment_to_the_declarations_list(): void
    {
        $this->assertNotEquals($this->label->declarations(), $this->alignedLabel->declarations());
        $this->assertEquals('--labels-align: center;', $this->alignedLabel->declarations()->toString());
    }
}
