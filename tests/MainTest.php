<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use function PHRamda\{
    _isFalsy,
    _isTruthy,
    _or,
};

final class MainTest extends TestCase
{
    public function test_isFalsy(): void
    {
        $this->assertTrue(_isFalsy(false));
        $this->assertTrue(_isFalsy(null));
        $this->assertTrue(_isFalsy(""));
        $this->assertTrue(_isFalsy(new \stdClass()));
        $this->assertTrue(_isFalsy([]));
        $this->assertTrue(_isFalsy(0));
    }

    public function testNot_isFalsy(): void
    {
        $this->assertFalse(_isFalsy(true));
        $this->assertFalse(_isFalsy("someString"));
        $this->assertFalse(_isFalsy([0]));
        $this->assertFalse(_isFalsy(1));
    }

    public function test_isTruthy(): void
    {
        $this->assertFalse(_isTruthy(false));
        $this->assertFalse(_isTruthy(null));
        $this->assertFalse(_isTruthy(""));
        $this->assertFalse(_isTruthy(new \stdClass()));
        $this->assertFalse(_isTruthy([]));
        $this->assertFalse(_isTruthy(0));
    }

    public function testNot_isTruthy(): void
    {
        $this->assertTrue(_isTruthy(true));
        $this->assertTrue(_isTruthy("someString"));
        $this->assertTrue(_isTruthy([0]));
        $this->assertTrue(_isTruthy(1));
    }

    public function test_or(): void
    {
        $ob = new \stdClass();
        $ob->key = "value";
        $truthyValues = [
            true,
            1,
            "string",
            [1],
            $ob,
        ];
        $rightValue = null;
        $this->assertSame(_or($truthyValues[0], $rightValue), $truthyValues[0]);
        $this->assertSame(_or($truthyValues[1], $rightValue), $truthyValues[1]);
        $this->assertSame(_or($truthyValues[2], $rightValue), $truthyValues[2]);
        $this->assertSame(_or($truthyValues[3], $rightValue), $truthyValues[3]);
        $this->assertSame(_or($truthyValues[4], $rightValue), $truthyValues[4]);
    }

    public function testNot_or(): void
    {
        $ob = new \stdClass();
        $falsyValues = [
            null,
            "",
            0,
            [],
            $ob,
            false,
        ];
        $rightValue = null;
        $this->assertSame(_or($falsyValues[0], $rightValue), $rightValue);
        $this->assertSame(_or($falsyValues[1], $rightValue), $rightValue);
        $this->assertSame(_or($falsyValues[2], $rightValue), $rightValue);
        $this->assertSame(_or($falsyValues[3], $rightValue), $rightValue);
        $this->assertSame(_or($falsyValues[4], $rightValue), $rightValue);
    }
}
