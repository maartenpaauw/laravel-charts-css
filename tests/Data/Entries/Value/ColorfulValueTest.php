<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries\Value;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Color;
use Maartenpaauw\Chartscss\Data\Entries\Value\ColorfulValue;
use Maartenpaauw\Chartscss\Data\Entries\Value\NullValue;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Tests\TestCase;

class ColorfulValueTest extends TestCase
{
    private ValueContract $value;

    private ValueContract $colorfulValue;

    protected function setUp(): void
    {
        parent::setUp();

        $this->value = new NullValue();
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
