<?php

namespace Maartenpaauw\Chartscss\Tests\Configuration;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Chartscss\Types\Column;

class ConfigurationTest extends TestCase
{
    private Identity $identity;

    private Legend $legend;

    private Modifications $modifications;

    private ConfigurationContract $configuration;

    private ColorschemeContract $colorscheme;

    protected function setUp(): void
    {
        parent::setUp();

        $this->identity = new Identity('my-chart', 'My chart', new Column());
        $this->legend = new Legend();
        $this->modifications = new Modifications();
        $this->colorscheme = new Colorscheme();

        $this->configuration = new Configuration(
            $this->identity,
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );
    }

    /** @test */
    public function it_can_access_the_identity(): void
    {
        $this->assertEquals($this->identity, $this->configuration->identity());
    }

    /** @test */
    public function it_can_access_the_legend(): void
    {
        $this->assertEquals($this->legend, $this->configuration->legend());
    }

    /** @test */
    public function it_can_access_the_modifications(): void
    {
        $this->assertEquals($this->modifications, $this->configuration->modifications());
    }

    /** @test */
    public function it_can_access_the_colorscheme(): void
    {
        $this->assertEquals($this->colorscheme, $this->configuration->colorscheme());
    }
}
