<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\fromPairs;
use function PHRamda\prop;

final class FromPairsTest extends TestCase
{
    public function testHappyPath(): void
    {
        $subject = [
            [0, 1],
            [1, 2],
            [2, 3],
            [3, 4],
            [4, 5],
            [5, null],
            [6, false]
        ];
        $result = fromPairs($subject);
        $this->assertEquals(1, prop(0, $result));
        $this->assertEquals(2, prop(1, $result));
        $this->assertEquals(3, prop(2, $result));
        $this->assertEquals(4, prop(3, $result));
        $this->assertEquals(5, prop(4, $result));
        $this->assertEquals(null, prop(5, $result));
        $this->assertEquals(false, prop(6, $result));
    }

    public function testHappyPathString(): void
    {
        $subject = [
            ['a', 1],
            ['b', 2],
            ['c', 3],
            ['d', 4],
            ['e', 5],
            ['f', null],
            ['g', false]
        ];
        $result = fromPairs($subject);
        $this->assertEquals(1, prop('a', $result));
        $this->assertEquals(2, prop('b', $result));
        $this->assertEquals(3, prop('c', $result));
        $this->assertEquals(4, prop('d', $result));
        $this->assertEquals(5, prop('e', $result));
        $this->assertEquals(null, prop('f', $result));
        $this->assertEquals(false, prop('g', $result));
    }
}
