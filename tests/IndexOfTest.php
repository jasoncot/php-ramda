<?php
declare(strict_types=1);

namespace Trailoff\PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function Trailoff\PHRamda\indexOf;

final class IndexOfTest extends TestCase
{
    public function testHappyPath(): void
    {
        $subject = [1, 2, 3, 4, 5];
        $this->assertEquals(0, indexOf(1, $subject));
        $this->assertEquals(1, indexOf(2, $subject));
        $this->assertEquals(2, indexOf(3, $subject));
        $this->assertEquals(3, indexOf(4, $subject));
        $this->assertEquals(4, indexOf(5, $subject));
    }

    public function testNotFound(): void
    {
        $subject = [1, 2, 3, 4, 5];
        $this->assertEquals(-1, indexOf(0, $subject));
        $this->assertEquals(-1, indexOf(false, $subject));
        $this->assertEquals(-1, indexOf(true, $subject));
        $this->assertEquals(-1, indexOf(null, $subject));
        $this->assertEquals(-1, indexOf("1", $subject));
        $this->assertEquals(-1, indexOf([], $subject));
        $this->assertEquals(-1, indexOf([1], $subject));
    }

    public function testSearchArray(): void
    {
        $subject = [[1], [2], [3], [4], [5]];
        $this->assertEquals(-1, indexOf(1, $subject));
        $this->assertEquals(-1, indexOf([true], $subject));
        $this->assertEquals(-1, indexOf([null], $subject));
        $this->assertEquals(0, indexOf([1], $subject));
        $this->assertEquals(4, indexOf([5], $subject));
    }
}
