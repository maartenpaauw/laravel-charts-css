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
        $mergedModifications = $this->modifications
            ->merge(new ModificationsBag([
                new HideLabel(),
            ]));

        return new self(
            $this->value,
            $mergedModifications,
            $this->declarations,
        );
    }

    public function align(string $alignment): LabelContract
    {
        $mergedDeclarations = $this->declarations
            ->merge(new Declarations([
                new LabelAlignmentDeclaration($alignment),
            ]));

        return new self(
            $this->value,
            $this->modifications,
            $mergedDeclarations,
        );
    }
}
