<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use function Trailoff\PHRamda\compose;

final class ComposeTest extends TestCase
{
    public function test_compose(): void
    {
        $callable1 = function ($arg0) {
            return $arg0 + 1;
        };

        $callable2 = function ($arg0) {
            return $arg0 + 1;
        };

        $composedFunctions = compose($callable1, $callable2);
        $this->assertEquals(2, $composedFunctions(0));
    }
}
