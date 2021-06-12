<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Data\Entries\Label\Label;
use Maartenpaauw\Chart\Data\Entries\Label\LabelContract;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Declarations\Declarations;

class Entry implements EntryContract
{
    private ValueContract $value;

    private LabelContract $label;

    public function __construct(float $value, string $label = '')
    {
        $this->value = new Value($value, strval($value), new Declarations());
        $this->label = new Label($label, new ModificationsBag());
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
