<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\comparitor;

final class ComparitorTest extends TestCase
{
    /**
     * @covers \PHRamda\comparitor
     */
    public function testComparitor(): void
    {
        $byInt = comparitor(function (int $a, int $b) {
            return $a < $b ? true : false;
        });

        self::assertEquals(-1, $byInt(2, 3));
        self::assertEquals(1, $byInt(3, 2));
        self::assertEquals(1, $byInt(3, 3));
    }
}
