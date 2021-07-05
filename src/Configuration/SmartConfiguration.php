<?php

namespace Maartenpaauw\Chartscss\Configuration;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\Multiple;
use Maartenpaauw\Chartscss\Appearance\ShowHeading;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;
use Maartenpaauw\Chartscss\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chartscss\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Specifications\HasDatasetLabels;
use Maartenpaauw\Chartscss\Data\Specifications\HasEntryLabels;
use Maartenpaauw\Chartscss\Data\Specifications\HasMultiple;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Specifications\AndSpecification;
use Maartenpaauw\Chartscss\Specifications\NotSpecification;
use Maartenpaauw\Chartscss\Specifications\OrSpecification;

class SmartConfiguration implements ConfigurationContract
{
    private ConfigurationContract $origin;

    private DatasetsContract $datasets;

    public function __construct(ConfigurationContract $origin, DatasetsContract $datasets)
    {
        $this->origin = $origin;
        $this->datasets = $datasets;
    }

    public function identity(): Identity
    {
        return $this->origin->identity();
    }

    public function legend(): Legend
    {
        if ($this->shouldConfigureLegend()) {
            return $this->origin->legend()->withLabels($this->datasets->axes()->data());
        }

        return $this->origin->legend();
    }

    public function modifications(): Modifications
    {
        $modifications = new Modifications($this->origin->modifications()->toArray());

        if ((new HasHeading())->isSatisfiedBy($this)) {
            $modifications = $modifications->add(new ShowHeading());
        }

        if ($this->hasMultipleDatasets()) {
            $modifications = $modifications->add(new Multiple());
        }

        if ($this->hasDataLabels()) {
            $modifications = $modifications->add(new ShowLabels());
        }

        return $modifications;
    }

    public function colorscheme(): ColorschemeContract
    {
        return $this->origin->colorscheme();
    }

    private function hasMultipleDatasets(): bool
    {
        return (new HasMultiple())->isSatisfiedBy($this->datasets);
    }

    private function shouldConfigureLegend(): bool
    {
        return $this->hasMultipleDatasets() &&
            (new NotSpecification(new HasLabels()))->isSatisfiedBy($this->origin);
    }

    private function hasDataLabels(): bool
    {
        $specification = new OrSpecification(
            new AndSpecification(new HasEntryLabels(), new NotSpecification(new HasMultiple())),
            new AndSpecification(new HasDatasetLabels(), new HasMultiple()),
        );

        return $specification->isSatisfiedBy($this->datasets);
    }
}
