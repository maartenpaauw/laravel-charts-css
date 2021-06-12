<?php

namespace Maartenpaauw\Chart\Data\Entries\Label;

use Maartenpaauw\Chart\Appearance\HideLabel;
use Maartenpaauw\Chart\Appearance\ModificationsBag;

class Label implements LabelContract
{
    private string $value;

    private ModificationsBag $modifications;

    public function __construct(string $value, ModificationsBag $modifications)
    {
        $this->value = $value;
        $this->modifications = $modifications;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function modifications(): ModificationsBag
    {
        return $this->modifications;
    }

    public function hide(): LabelContract
    {
        $this->modifications->add(new HideLabel());

        return $this;
    }
}
