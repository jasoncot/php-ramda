<?php
declare(strict_types=1);

namespace Trailoff\PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function Trailoff\PHRamda\values;
use function Trailoff\PHRamda\indexOf;

final class ValuesTest extends TestCase
{
    public function testHappyPath(): void
    {
        $subject = [1, 2, 3, 4, 5];
        $this->assertEquals($subject, values($subject));
    }

    public function testHappyPathAssoc(): void
    {
        $subject = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
        $this->assertEquals([1, 2, 3, 4, 5], values($subject));
    }

    public function testHappyPathObject(): void
    {
        $subject = new \stdClass();
        $subject->a = 1;
        $subject->b = 2;
        $subject->c = 3;
        $subject->d = 4;
        $subject->e = 5;
        $result = values($subject);
        $this->assertTrue(indexOf(1, $result) !== -1);
        $this->assertTrue(indexOf(2, $result) !== -1);
        $this->assertTrue(indexOf(3, $result) !== -1);
        $this->assertTrue(indexOf(4, $result) !== -1);
        $this->assertTrue(indexOf(5, $result) !== -1);
    }
}
