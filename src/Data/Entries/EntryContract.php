<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Declarations\Declarations;

interface EntryContract
{
    public function value(): ValueContract;

    public function label(): LabelContract;

    public function declarations(): Declarations;
}
