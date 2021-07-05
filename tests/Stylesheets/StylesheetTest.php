<?php

namespace Maartenpaauw\Chartscss\Tests\Stylesheets;

use Maartenpaauw\Chartscss\Stylesheets\StylesheetContract;
use Maartenpaauw\Chartscss\Tests\TestCase;

abstract class StylesheetTest extends TestCase
{
    abstract protected function stylesheet(): StylesheetContract;

    abstract protected function href(): string;

    /** @test */
    public function it_should_return_the_correct_href(): void
    {
        $this->assertEquals($this->href(), $this->stylesheet()->href());
    }
}
