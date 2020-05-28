<?php
declare(strict_types=1);

namespace PHRamda\Tests;

use PHPUnit\Framework\TestCase;
use function PHRamda\adjust;

final class AdjustTest extends TestCase {
    public function testAdjust(): void
    {
        $src = [1, 2, 3];
        $dst = adjust(
            1,
            function () {
                return 0;
            },
            $src
        );
        $this->assertEquals([1, 0, 3], $dst);
    }

    public function testAdjustPartial1(): void
    {
        $src = [1, 2, 3];
        $always0 = function () {
            return 0;
        };
        $partialAdjust = adjust(0, $always0);
        $this->assertEquals([0, 2, 3], $partialAdjust($src));
    }
}
