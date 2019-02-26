<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\call;
use function PHRamda\concat;

final class CallTest extends TestCase
{
    /**
     * @covers \PHRamda\call
     * @uses \PHRamda\concat
     */
    public function testCall(): void
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };
        self::assertEquals(5, call($sum, 2, 3));

        $merge = function ($a, $b) {
            return concat($a, $b);
        };
        self::assertEquals([2, 3], call($merge, [2], [3]));
    }
}
