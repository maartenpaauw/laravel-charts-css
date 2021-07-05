<?php

namespace Maartenpaauw\Chartscss\Tests\Configuration;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Configuration\SmartConfiguration;
use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Chartscss\Types\Column;

class SmartConfigurationTest extends TestCase
{
    private ConfigurationContract $configuration;

    private ConfigurationContract $smartConfiguration;

    private Identity $identity;

    private Legend $legend;

    private Modifications $modifications;

    private ColorschemeContract $colorscheme;

    private DatasetsContract $datasets;

    protected function setUp(): void
    {
        parent::setUp();

        $this->datasets = new Datasets(
            new Axes('A', ['B', 'C']),
            new Dataset([], new Label('Dataset 1')),
            new Dataset([], new Label('Dataset 2')),
        );

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

        $this->smartConfiguration = new SmartConfiguration($this->configuration, $this->datasets);
    }

    /** @test */
    public function it_should_return_the_origin_identity(): void
    {
        $this->assertEquals($this->configuration->identity(), $this->smartConfiguration->identity());
        $this->assertEquals($this->identity, $this->smartConfiguration->identity());
    }

    /** @test */
    public function it_should_automatically_add_the_data_axes_as_labels_to_the_legend(): void
    {
        $this->assertCount(2, $this->smartConfiguration->legend()->labels());
        $this->assertContains('B', $this->smartConfiguration->legend()->labels());
        $this->assertContains('C', $this->smartConfiguration->legend()->labels());
        $this->assertNotEquals($this->legend, $this->smartConfiguration->legend());
    }

    /** @test */
    public function it_should_not_add_any_labels_to_the_legend_when_it_is_configured_manually(): void
    {
        // Arrange
        $legend = new Legend(['My label']);

        // Act
        $smartConfiguration = new SmartConfiguration(
            new Configuration(
                $this->identity,
                $legend,
                $this->modifications,
                $this->colorscheme,
            ),
            $this->datasets,
        );

        // Assert
        $this->assertCount(1, $smartConfiguration->legend()->labels());
        $this->assertContains('My label', $smartConfiguration->legend()->labels());
        $this->assertNotContains('B', $smartConfiguration->legend()->labels());
        $this->assertNotContains('C', $smartConfiguration->legend()->labels());
        $this->assertEquals($legend, $smartConfiguration->legend());
    }

    /** @test */
    public function it_should_return_the_origin_colorscheme(): void
    {
        $this->assertEquals($this->configuration->colorscheme(), $this->smartConfiguration->colorscheme());
        $this->assertEquals($this->colorscheme, $this->smartConfiguration->colorscheme());
    }

    /** @test */
    public function it_should_have_the_show_heading_modification_when_the_heading_is_configured(): void
    {
        // Arrange
        $expectedClass = 'show-heading';

        // Assert
        $this->assertContains($expectedClass, $this->smartConfiguration->modifications()->classes());
        $this->assertNotContains($expectedClass, $this->configuration->modifications()->classes());
    }

    /** @test */
    public function it_should_have_the_multiple_modification_when_there_are_multiple_datasets_configured(): void
    {
        // Arrange
        $expectedClass = 'multiple';

        // Assert
        $this->assertContains($expectedClass, $this->smartConfiguration->modifications()->classes());
        $this->assertNotContains($expectedClass, $this->configuration->modifications()->classes());
    }

    /** @test */
    public function it_should_have_the_show_labels_modification_when_there_are_multiple_datasets_configured(): void
    {
        // Arrange
        $expectedClass = 'show-labels';

        // Assert
        $this->assertContains($expectedClass, $this->smartConfiguration->modifications()->classes());
        $this->assertNotContains($expectedClass, $this->configuration->modifications()->classes());
    }

    /** @test */
    public function it_should_have_three_modifications_automatically_added(): void
    {
        $this->assertCount(0, $this->configuration->modifications()->toArray());
        $this->assertCount(3, $this->smartConfiguration->modifications()->toArray());
    }

    /** @test */
    public function it_should_have_the_show_labels_modification_when_a_single_dataset_with_labels_is_configured(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            new Dataset([
                new Entry(new Value(10), new Label('Label A')),
                new Entry(new Value(10), new Label('Label B')),
            ]),
        );

        // Act
        $smartConfiguration = new SmartConfiguration($this->configuration, $datasets);

        // Assert
        $this->assertContains('show-labels', $smartConfiguration->modifications()->classes());
    }

    /** @test */
    public function it_should_not_have_the_show_labels_modification_when_a_single_dataset_has_no_labels_configured(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            new Dataset([
                new Entry(new Value(10)),
                new Entry(new Value(10)),
            ]),
        );

        // Act
        $smartConfiguration = new SmartConfiguration($this->configuration, $datasets);

        // Assert
        $this->assertNotContains('show-labels', $smartConfiguration->modifications()->classes());
    }

    /** @test */
    public function it_should_have_the_show_labels_modification_when_multiple_datasets_have_labels_configured(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            new Dataset([], new Label('Label A')),
            new Dataset([], new Label('Label B')),
        );

        // Act
        $smartConfiguration = new SmartConfiguration($this->configuration, $datasets);

        // Assert
        $this->assertContains('show-labels', $smartConfiguration->modifications()->classes());
    }

    /** @test */
    public function it_should_have_the_show_labels_modification_when_there_are_no_datasets_with_a_label(): void
    {
        // Arrange
        $datasets = new Datasets(
            new NullAxes(),
            new Dataset(),
            new Dataset(),
        );

        // Act
        $smartConfiguration = new SmartConfiguration($this->configuration, $datasets);

        // Assert
        $this->assertNotContains('show-labels', $smartConfiguration->modifications()->classes());
    }
}
