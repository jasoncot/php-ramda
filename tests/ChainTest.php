<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\chain;

final class ChainTest extends TestCase
{
    /**
     * @covers \PHRamda\chain
     * @uses \PHRamda\map
     * @uses \PHRamda\flatten
     */
    public function testCall(): void
    {
        $id = function ($a) {
            return $a;
        };

        self::assertEquals([2, 3], chain($id, 2, 3));

        $dupeId = function ($a) {
            return [$a, $a];
        };
        self::assertEquals([1, 1, 2, 2, 3, 3], call($dupeId, [1, 2, 3]));
    }
}
