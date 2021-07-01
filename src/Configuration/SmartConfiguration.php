<?php

namespace Maartenpaauw\Chart\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowHeading;
use Maartenpaauw\Chart\Appearance\ShowLabels;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Specifications\HasDatasetLabels;
use Maartenpaauw\Chart\Data\Specifications\HasEntryLabels;
use Maartenpaauw\Chart\Data\Specifications\HasMultiple;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Specifications\AndSpecification;
use Maartenpaauw\Chart\Specifications\NotSpecification;
use Maartenpaauw\Chart\Specifications\OrSpecification;

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
            $this->origin->legend()->withLabels($this->datasets->axes()->data());
        }

        return $this->origin->legend();
    }

    public function modifications(): Modifications
    {
        $modifications = new Modifications($this->origin->modifications()->toArray());

        if ((new HasHeading())->isSatisfiedBy($this)) {
            $modifications->add(new ShowHeading());
        }

        if ($this->hasMultipleDatasets()) {
            $modifications->add(new Multiple());
        }

        if ($this->hasDataLabels()) {
            $modifications->add(new ShowLabels());
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
