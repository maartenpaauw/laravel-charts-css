<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries\Value;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Data\Entries\Value\ColorfulValue;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Tests\TestCase;

class ColorfulValueTest extends TestCase
{
    private ValueContract $value;

    private ValueContract $colorfulValue;

    protected function setUp(): void
    {
        parent::setUp();

        $this->value = new Value(0);
        $this->colorfulValue = new ColorfulValue($this->value, new Color('red'));
    }

    /** @test */
    public function it_should_return_the_origin_raw(): void
    {
        $this->assertEquals($this->value->raw(), $this->colorfulValue->raw());
    }

    /** @test */
    public function it_should_return_the_origin_display(): void
    {
        $this->assertEquals($this->value->display(), $this->colorfulValue->display());
    }

    /** @test */
    public function it_should_add_the_color_to_the_declaration_list(): void
    {
        $this->assertNotEquals($this->value->declarations(), $this->colorfulValue->declarations());
        $this->assertCount(1, $this->colorfulValue->declarations()->toArray());
        $this->assertEquals('--color: red;', $this->colorfulValue->declarations()->toString());
    }
}
