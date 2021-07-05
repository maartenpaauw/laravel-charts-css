<?php

namespace Maartenpaauw\Chartscss\Tests\Declarations;

use Maartenpaauw\Chartscss\Declarations\DeclarationContract;
use Maartenpaauw\Chartscss\Declarations\LabelAlignmentDeclaration;

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

    /** @test */
    public function it_should_prefix_the_alignment_with_flex_when_needed(): void
    {
        // Arrange
        $start = new LabelAlignmentDeclaration('start');
        $end = new LabelAlignmentDeclaration('end');

        // Assert
        $this->assertEquals('--labels-align: flex-start;', $start->toString());
        $this->assertEquals('--labels-align: flex-end;', $end->toString());
    }
}
