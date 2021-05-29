<?php

namespace Maartenpaauw\Chart\Tests\Legend;

use Maartenpaauw\Chart\Legend\Shape;
use Maartenpaauw\Chart\Tests\TestCase;

class ShapeTest extends TestCase
{
    /** @test */
    public function it_should_contain_the_correct_value_for_each_shape(): void
    {
        $this->assertEquals('', Shape::NONE);
        $this->assertEquals('circle', Shape::CIRCLE);
        $this->assertEquals('ellipse', Shape::ELLIPSE);
        $this->assertEquals('line', Shape::LINE);
        $this->assertEquals('rectangle', Shape::RECTANGLE);
        $this->assertEquals('rhombus', Shape::RHOMBUS);
        $this->assertEquals('square', Shape::SQUARE);
    }
}
