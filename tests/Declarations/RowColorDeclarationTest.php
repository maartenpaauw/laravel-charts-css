<?php

namespace Maartenpaauw\Chartscss\Tests\Declarations;

use Maartenpaauw\Chartscss\Declarations\DeclarationContract;
use Maartenpaauw\Chartscss\Declarations\RowColorDeclaration;

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
