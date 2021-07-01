<?php

namespace Maartenpaauw\Chart\Data\Label;

use Maartenpaauw\Chart\Appearance\HideLabel;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Declarations\LabelAlignmentDeclaration;

class Label implements LabelContract
{
    private string $value;

    private ModificationsBag $modifications;

    private Declarations $declarations;

    public function __construct(string $value, ?ModificationsBag $modifications = null, ?Declarations $declarations = null)
    {
        $this->value = $value;
        $this->modifications = $modifications ?? new ModificationsBag();
        $this->declarations = $declarations ?? new Declarations();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function modifications(): ModificationsBag
    {
        return $this->modifications;
    }

    public function declarations(): Declarations
    {
        return $this->declarations;
    }

    public function hide(): LabelContract
    {
        $this->modifications->add(new HideLabel());

        return $this;
    }

    public function align(string $alignment): LabelContract
    {
        return new self(
            $this->value,
            $this->modifications,
            $this->declarations->merge(new Declarations([
                new LabelAlignmentDeclaration($alignment),
            ])),
        );
    }
}
