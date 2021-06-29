<?php

namespace Maartenpaauw\Chart\Tests\Declarations;

use Maartenpaauw\Chart\Declarations\DeclarationContract;
use Maartenpaauw\Chart\Declarations\LabelAlignmentDeclaration;

class LabelAlignmentDeclarationTest extends DeclarationTest
{
    public function declaration(): DeclarationContract
    {
        return new LabelAlignmentDeclaration('center');
    }

    public function expectedString(): string
    {
        return '--labels-align: center;';
    }
}
