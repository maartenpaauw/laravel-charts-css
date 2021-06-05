<?php

namespace Maartenpaauw\Chart\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowHeading;
use Maartenpaauw\Chart\Appearance\ShowLabels;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Data\DatasetsContract;
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
        return $this->origin->legend();
    }

    public function modifications(): ModificationsBag
    {
        $modificationsBag = new ModificationsBag($this->origin->modifications()->toArray());

        if ((new HasHeading())->isSatisfiedBy($this)) {
            $modificationsBag->add(new ShowHeading());
        }

        if ((new HasMultiple())->isSatisfiedBy($this->datasets)) {
            $modificationsBag->add(new Multiple());
            $modificationsBag->add(new ShowLabels());
        }

        return $modificationsBag;
    }

    public function colorscheme(): ColorschemeContract
    {
        return $this->origin->colorscheme();
    }
}
