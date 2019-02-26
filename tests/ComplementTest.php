<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\complement;

final class ComplementTest extends TestCase
{
    /**
     * @covers \PHRamda\complement
     */
    public function testComplement(): void
    {
        $alwaysFalse = complement(function () {
            return true;
        });
        $alwaysTrue = complement(function () {
            return false;
        });

        self::assertTrue($alwaysTrue());
        self::assertFalse($alwaysFalse());
    }
}
