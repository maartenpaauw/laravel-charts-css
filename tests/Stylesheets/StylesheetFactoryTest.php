<?php

namespace Maartenpaauw\Chartscss\Tests\Stylesheets;

use Maartenpaauw\Chartscss\Stylesheets\JSDelivrStylesheet;
use Maartenpaauw\Chartscss\Stylesheets\NullStylesheet;
use Maartenpaauw\Chartscss\Stylesheets\StylesheetFactory;
use Maartenpaauw\Chartscss\Stylesheets\UnpkgStylesheet;
use Maartenpaauw\Chartscss\Tests\TestCase;

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
