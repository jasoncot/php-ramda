<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\aperture;

final class ApertureTest extends TestCase
{
    public function testApertureBaseCase(): void
    {
        $testResult = aperture(1, [1, 2, 3, 4, 5]);
        $this->assertEquals(5, count($testResult));
        $this->assertEquals([1], $testResult[0]);
        $this->assertEquals([2], $testResult[1]);
        $this->assertEquals([3], $testResult[2]);
        $this->assertEquals([4], $testResult[3]);
        $this->assertEquals([5], $testResult[4]);

        $testResult = aperture(2, [1, 2, 3, 4, 5]);
        $this->assertEquals(4, count($testResult));
        $this->assertEquals([1, 2], $testResult[0]);
        $this->assertEquals([2, 3], $testResult[1]);
        $this->assertEquals([3, 4], $testResult[2]);
        $this->assertEquals([4, 5], $testResult[3]);

        $testResult = aperture(3, [1, 2, 3, 4, 5]);
        $this->assertEquals(count($testResult), 3);
        $this->assertEquals([1, 2, 3], $testResult[0]);
        $this->assertEquals([2, 3, 4], $testResult[1]);
        $this->assertEquals([3, 4, 5], $testResult[2]);

        $testResult = aperture(4, [1, 2, 3, 4, 5]);
        $this->assertEquals(count($testResult), 2);
        $this->assertEquals([1, 2, 3, 4], $testResult[0]);
        $this->assertEquals([2, 3, 4, 5], $testResult[1]);

        $testResult = aperture(5, [1, 2, 3, 4, 5]);
        $this->assertEquals(count($testResult), 1);
        $this->assertEquals([1, 2, 3, 4, 5], $testResult[0]);
    }

    public function testApertureEdgeCaseZero(): void
    {
        $testResult = aperture(0, [1, 2, 3, 4, 5]);
        $this->assertEquals(0, count($testResult));

        $testResult = aperture(-1, [1, 2, 3, 4, 5]);
        $this->assertEquals(0, count($testResult));

        $testResult = aperture(-10, [1, 2, 3, 4, 5]);
        $this->assertEquals(0, count($testResult));

        $testResult = aperture(0, [1]);
        $this->assertEquals(0, count($testResult));

        $testResult = aperture(0, []);
        $this->assertEquals(0, count($testResult));
    }

    public function testApertureEdgeCaseLargerThanSubject(): void
    {
        $testResult = aperture(6, [1, 2, 3, 4, 5]);
        $this->assertEquals(count($testResult), 0);

        $testResult = aperture(20, [1, 2, 3, 4, 5]);
        $this->assertEquals(count($testResult), 0);
    }
}
