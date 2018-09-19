<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\toPairs;

final class ToPairsTest extends TestCase
{
    public function testHappyPath(): void
    {
        $subject = [1, 2, 3, 4, 5, null, false];
        $this->assertEquals(
            [
                [0, 1],
                [1, 2],
                [2, 3],
                [3, 4],
                [4, 5],
                [5, null],
                [6, false]
            ],
            toPairs($subject)
        );
    }

    public function testHappyPathAssoc(): void
    {
        $subject = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => null, 'g' => false];
        $this->assertEquals(
            [
                ['a', 1],
                ['b', 2],
                ['c', 3],
                ['d', 4],
                ['e', 5],
                ['f', null],
                ['g', false]
            ],
            toPairs($subject)
        );
    }

    public function testHappyPathObject(): void
    {
        $subject = new \stdClass();
        $subject->a = 1;
        $subject->b = 2;
        $subject->c = 3;
        $subject->d = 4;
        $subject->e = 5;
        $subject->f = null;
        $subject->g = false;
        $this->assertEquals(
            [
                ['a', 1],
                ['b', 2],
                ['c', 3],
                ['d', 4],
                ['e', 5],
                ['f', null],
                ['g', false]
            ],
            toPairs($subject)
        );
    }
}
