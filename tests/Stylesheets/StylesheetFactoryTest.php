<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\JSDelivrStylesheet;
use Maartenpaauw\Chart\Stylesheets\NullStylesheet;
use Maartenpaauw\Chart\Stylesheets\StylesheetFactory;
use Maartenpaauw\Chart\Stylesheets\UnpkgStylesheet;
use Maartenpaauw\Chart\Tests\TestCase;

class StylesheetFactoryTest extends TestCase
{
    /** @test */
    public function it_should_create_the_stylesheet_correctly(): void
    {
        // Arrange
        $factory = new StylesheetFactory();

        // Assert
        $this->assertInstanceOf(JSDelivrStylesheet::class, $factory->create('jsdelivr'));
        $this->assertInstanceOf(UnpkgStylesheet::class, $factory->create('unpkg'));
        $this->assertInstanceOf(NullStylesheet::class, $factory->create('non-existing-cdn'));
        $this->assertInstanceOf(NullStylesheet::class, $factory->create());
    }
}
