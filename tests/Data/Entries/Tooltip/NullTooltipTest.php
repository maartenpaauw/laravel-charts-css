<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries\Tooltip;

use Maartenpaauw\Chartscss\Data\Entries\Tooltip\NullTooltip;
use Maartenpaauw\Chartscss\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chartscss\Tests\TestCase;

class NullTooltipTest extends TestCase
{
    private TooltipContract $tooltip;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tooltip = new NullTooltip();
    }

    /** @test */
    public function it_should_return_an_empty_string_as_content(): void
    {
        // Act
        $content = $this->tooltip->content();

        // Assert
        $this->assertEmpty($content);
    }
}
