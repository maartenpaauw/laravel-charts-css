<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Declarations\Declarations;

class NullEntry implements EntryContract
{
    public function value(): ValueContract
    {
        return new Value(0, '-');
    }

    public function declarations(): Declarations
    {
        return new Declarations();
    }

    public function label(): LabelContract
    {
        return new Label('-', new Modifications());
    }
}
