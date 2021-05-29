<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\Stylesheet;
use Maartenpaauw\Chart\Tests\TestCase;

abstract class StylesheetTest extends TestCase
{
    abstract protected function stylesheet(): Stylesheet;

    abstract protected function href(): string;

    /** @test */
    public function it_should_return_the_correct_href(): void
    {
        $this->assertEquals($this->href(), $this->stylesheet()->href());
    }
}