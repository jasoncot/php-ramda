<?php
declare(strict_types=1);

namespace Trailoff\PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function Trailoff\PHRamda\assoc;
use function Trailoff\PHRamda\prop;
use function Trailoff\PHRamda\replace;

final class ReplaceTest extends TestCase
{
    public function testReplaceString(): void
    {
        $testSubject = "a string to hack";
        $this->assertEquals(
            "a string to test",
            replace("hack", "test", $testSubject)
        );
        $this->assertEquals(
            "begining of string string to hack",
            replace("a", "begining of string", $testSubject)
        );
        $this->assertEquals(
            "a string to hack-hacky-hack",
            replace("k", "k-hacky-hack", $testSubject)
        );
    }

    public function testReplaceStringNotFound(): void
    {
        $testSubject = "a string to hack";
        $this->assertEquals(
            "a string to hack",
            replace("test", "hack", $testSubject)
        );
    }

    public function testReplaceArray(): void
    {
        $testSubject = [1, 2, 3, 4, 5];
        $this->assertEquals(
            [1, 2, 3, 0, 5],
            replace(4, 0, $testSubject)
        );
        $this->assertEquals(
            [1, 2, 3, 0, 5],
            replace(4, 0, $testSubject)
        );

    }
}
