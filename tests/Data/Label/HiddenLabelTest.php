<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Label;

use Maartenpaauw\Chartscss\Data\Label\HiddenLabel;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;
use Maartenpaauw\Chartscss\Data\Label\NullLabel;
use Maartenpaauw\Chartscss\Tests\TestCase;

class HiddenLabelTest extends TestCase
{
    private LabelContract $label;

    private LabelContract $hiddenLabel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label = new NullLabel();
        $this->hiddenLabel = new HiddenLabel($this->label);
    }

    /** @test */
    public function it_should_return_the_origin_value(): void
    {
        $this->assertEquals($this->label->value(), $this->hiddenLabel->value());
    }

    /** @test */
    public function it_should_return_the_origin_declarations(): void
    {
        $this->assertEquals($this->label->declarations(), $this->hiddenLabel->declarations());
    }

    /** @test */
    public function it_should_add_hide_label_to_the_modifications_list(): void
    {
        $this->assertNotEquals($this->label->modifications(), $this->hiddenLabel->modifications());
        $this->assertContains('hide-label', $this->hiddenLabel->modifications()->classes());
    }
}
