<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use PHRamda\Functors\Left;
use PHRamda\Functors\Right;
use PHRamda\Functors\Either;

use function PHRamda\either;

final class EitherTest extends TestCase
{
    public function testEitherHappyCase(): void
    {
        $testValue = true;
        $leftTestValue = "value was null";
        $subject = either($leftTestValue, $testValue);
        $this->assertTrue($subject instanceof Either);
        $this->assertEquals(Right::class, get_class($subject));
        $this->assertEquals($testValue, $subject->getRight(null));

        $subject = either($leftTestValue, null);
        $this->assertTrue($subject instanceof Either);
        $this->assertEquals(Left::class, get_class($subject));
        $this->assertEquals(null, $subject->getRight(null));
        $this->assertEquals($leftTestValue, $subject->getLeft(null));
    }

    public function testEitherFilter(): void
    {
        $either = either('Left Value', 'Right Value');
        $this->assertEquals(Right::class, get_class($either));
        $either = $either->filter(function ($value) { return $value === 'Right Value'; }, 'was not right value');
        $this->assertEquals(Right::class, get_class($either));
        $either = $either->filter(function ($value) { return $value === 'Left Value'; }, 'was not left value');
        $this->assertEquals(Left::class, get_class($either));

        $either = either('LeftValue', null);
        $this->assertEquals(Left::class, get_class($either));

        $either = $either->filter(
          function () {
            return false;
          },
          'error message'
        );
        $this->assertEquals(Left::class, get_class($either));
    }

    public function testEitherMap(): void
    {
      $either = either('Left Value', 'Right Value');
      $this->assertEquals(Right::class, get_class($either));
      $this->assertEquals('Right Value', $either->getOrElse(null));

      $either = $either->map('strtoupper');
      $this->assertEquals('RIGHT VALUE', $either->getOrElse(null));
      $this->assertEquals(Right::class, get_class($either));

      $either = Left::of('Left Value');
      $this->assertEquals(Left::class, get_class($either));
      $either = $either->map('strtoupper');
      $this->assertEquals('Left Value', $either->get());
    }

    public function testEitherFlatMap(): void
    {
      $either = Right::of('Right value');
      $this->assertEquals(Right::class, get_class($either));

      try {
        $result = $either->flatMap('strtoupper');
        $this->assertFalse($te !== null);
      } catch (\TypeError $te) {
        $this->assertTrue($te !== null);
      }

      $either = $either->flatMap(
        function ($value) {
          return Right::of(strtoupper($value));
        }
      );

      $this->assertEquals(Right::class, get_class($either));
      $this->assertEquals('RIGHT VALUE', $either->get());
    }
}
