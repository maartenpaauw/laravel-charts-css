<?php

namespace Maartenpaauw\Chart\Data\Label;

use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Declarations\Declarations;

interface LabelContract
{
    public function value(): string;

    public function modifications(): ModificationsBag;

    public function declarations(): Declarations;

    public function hide(): LabelContract;

    public function align(string $alignment): LabelContract;
}
