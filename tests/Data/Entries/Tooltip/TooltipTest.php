<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries\Tooltip;

use Maartenpaauw\Chartscss\Data\Entries\Tooltip\Tooltip;
use Maartenpaauw\Chartscss\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chartscss\Tests\TestCase;

class TooltipTest extends TestCase
{
    private TooltipContract $tooltip;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tooltip = new Tooltip('This is my tooltip.');
    }

    /** @test */
    public function it_should_receive_the_content_correctly(): void
    {
        // Arrange
        $expectedContent = 'This is my tooltip.';

        // Act
        $content = $this->tooltip->content();

        // Assert
        $this->assertEquals($expectedContent, $content);
    }
}
