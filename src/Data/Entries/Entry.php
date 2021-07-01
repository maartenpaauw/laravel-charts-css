<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Declarations\StartDeclaration;

class Entry implements EntryContract
{
    private ValueContract $value;

    private LabelContract $label;

    public function __construct(ValueContract $value, ?LabelContract $label = null)
    {
        $this->value = $value;
        $this->label = $label ?? new Label('');
    }

    public function value(): ValueContract
    {
        return $this->value;
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

    public function start(float $value): EntryContract
    {
        $this->value->declarations()->add(new StartDeclaration($value, 1));

        return $this;
    }

    public function hideLabel(): EntryContract
    {
        $this->label->hide();

        return $this;
    }

    public function alignLabel(string $alignment): EntryContract
    {
        return new self(
            $this->value,
            $this->label->align($alignment),
        );
    }
}
