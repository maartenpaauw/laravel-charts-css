<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Data\Entries\Label\Label;
use Maartenpaauw\Chart\Data\Entries\Label\LabelContract;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Declarations\Declarations;

class Entry implements EntryContract
{
    private ValueContract $value;

    private LabelContract $label;

    public function __construct(ValueContract $value, ?LabelContract $label = null)
    {
        $this->value = $value;
        $this->label = $label ?? new Label('');
    }

    public function value(): string
    {
        return $this->value->display();
    }

    public function raw(): float
    {
        return $this->value->raw();
    }

    public function start(): float
    {
        return $this->value->raw();
    }

    public function label(): LabelContract
    {
        return $this->label;
    }

    public function declarations(): Declarations
    {
        return $this->value->declarations();
    }

    public function color(ColorContract $color): EntryContract
    {
        $this->value->declarations()->add($color->declaration());

        return $this;
    }

    public function hideLabel(): EntryContract
    {
        $this->label->hide();

        return $this;
    }
}
