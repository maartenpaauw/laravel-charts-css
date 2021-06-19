<?php

namespace Maartenpaauw\Chart\Tests\Declarations;

use Maartenpaauw\Chart\Declarations\DeclarationContract;
use Maartenpaauw\Chart\Declarations\SizeDeclaration;

class SizeDeclarationTest extends DeclarationTest
{
    public function declaration(): DeclarationContract
    {
        return new SizeDeclaration(10, 100);
    }

    public function expectedString(): string
    {
        return '--size: calc(10 / 100);';
    }
}
