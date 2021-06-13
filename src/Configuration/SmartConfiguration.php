<?php

namespace Maartenpaauw\Chart\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowHeading;
use Maartenpaauw\Chart\Appearance\ShowLabels;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chart\Configuration\Specifications\NotSpecification;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Specifications\HasMultiple;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;

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
        if ($this->hasMultipleDatasets() && $this->doesNotHaveLabels()) {
            $this->origin->legend()->withLabels($this->datasets->axes()->data());
        }

        return $this->origin->legend();
    }

    public function modifications(): ModificationsBag
    {
        $modificationsBag = new ModificationsBag($this->origin->modifications()->toArray());

        if ((new HasHeading())->isSatisfiedBy($this)) {
            $modificationsBag->add(new ShowHeading());
        }

        if ($this->hasMultipleDatasets()) {
            $modificationsBag->add(new Multiple());
            $modificationsBag->add(new ShowLabels());
        }

        return $modificationsBag;
    }

    public function colorscheme(): ColorschemeContract
    {
        return $this->origin->colorscheme();
    }

    private function hasMultipleDatasets(): bool
    {
        return (new HasMultiple())->isSatisfiedBy($this->datasets);
    }

    private function doesNotHaveLabels(): bool
    {
        return (new NotSpecification(new HasLabels()))->isSatisfiedBy($this->origin);
    }
}
