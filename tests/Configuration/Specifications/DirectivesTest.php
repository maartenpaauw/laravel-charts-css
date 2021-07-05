<?php

namespace Maartenpaauw\Chartscss\Tests\Configuration\Specifications;

use Illuminate\Support\Facades\Blade;
use Maartenpaauw\Chartscss\Configuration\Specifications\Directives;
use Maartenpaauw\Chartscss\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chartscss\Tests\TestCase;

class DirectivesTest extends TestCase
{
    /** @test */
    public function it_should_register_a_specification_directive_correctly(): void
    {
        // Arrange
        $directives = new Directives();

        // Act
        $directives->register(new HasLabels(), 'custom');

        // Assert
        $this->assertArrayHasKey('custom', Blade::getCustomDirectives());
        $this->assertArrayHasKey('unlesscustom', Blade::getCustomDirectives());
        $this->assertArrayHasKey('elsecustom', Blade::getCustomDirectives());
        $this->assertArrayHasKey('endcustom', Blade::getCustomDirectives());
    }
}
