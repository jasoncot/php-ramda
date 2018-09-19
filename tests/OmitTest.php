<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use function PHRamda\omit;
use function PHRamda\prop;

final class OmitTest extends TestCase
{
    public function testHappyPath(): void
    {
        $subject = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];
        $toOmit = ['a', 'b'];
        $result = omit($toOmit, $subject);
        $this->assertNull(prop('a', $result));
        $this->assertNull(prop('b', $result));
        $this->assertEquals(3, prop('c', $result));
        $this->assertEquals(4, prop('d', $result));
    }

    public function testHappyPathObject(): void
    {
        $subject = new \stdClass();
        $subject->a = 1;
        $subject->b = 2;
        $subject->c = 3;
        $subject->d = 4;

        $toOmit = ['a', 'b'];
        $result = omit($toOmit, $subject);
        $this->assertNull(prop('a', $result));
        $this->assertNull(prop('b', $result));
        $this->assertEquals(3, prop('c', $result));
        $this->assertEquals(4, prop('d', $result));
    }

    public function testHappyPathNoResult(): void
    {
        $subject = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];
        $toOmit = ['e'];
        $result = omit($toOmit, $subject);
        $this->assertTrue(is_array($result));
        $this->assertEquals(1, prop('a', $result));
        $this->assertEquals(2, prop('b', $result));
        $this->assertEquals(3, prop('c', $result));
        $this->assertEquals(4, prop('d', $result));
    }

    public function testHappyPathNoResultObject(): void
    {
        $subject = new \stdClass();
        $subject->a = 1;
        $subject->b = 2;
        $subject->c = 3;
        $subject->d = 4;

        $toOmit = ['e'];
        $result = omit($toOmit, $subject);
        $this->assertTrue(is_object($result));
        $this->assertEquals(1, prop('a', $result));
        $this->assertEquals(2, prop('b', $result));
        $this->assertEquals(3, prop('c', $result));
        $this->assertEquals(4, prop('d', $result));
    }
}
