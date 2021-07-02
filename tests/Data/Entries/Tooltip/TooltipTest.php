<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries\Tooltip;

use Maartenpaauw\Chart\Data\Entries\Tooltip\Tooltip;
use Maartenpaauw\Chart\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chart\Tests\TestCase;

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
