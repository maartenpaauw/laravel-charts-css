<?php

namespace Maartenpaauw\Chart\Data\Entries\Label;

use Maartenpaauw\Chart\Appearance\ModificationsBag;

interface LabelContract
{
    public function value(): string;

    public function modifications(): ModificationsBag;

    public function hide(): LabelContract;
}
