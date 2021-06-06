<?php

namespace Maartenpaauw\Chart\Tests\Declarations;

use Maartenpaauw\Chart\Declarations\DeclarationContract;
use Maartenpaauw\Chart\Declarations\RowColorDeclaration;

class RowColorDeclarationTest extends DeclarationTest
{

    public function declaration(): DeclarationContract
    {
        return new RowColorDeclaration('#FF0000', 3);
    }

    public function expectedString(): string
    {
        return '--color-3: #FF0000;';
    }
}
