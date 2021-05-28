<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\StylesheetStrategy;
use Maartenpaauw\Chart\Tests\TestCase;

abstract class StylesheetStrategyTest extends TestCase
{
    abstract protected function stylesheet(): StylesheetStrategy;

    abstract protected function href(): string;

    /** @test */
    public function it_should_return_the_correct_href(): void
    {
        $this->assertEquals($this->href(), $this->stylesheet()->href());
    }
}
