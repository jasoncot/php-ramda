<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
// use PHRamda\Functors\Either;
use PHRamda\Functors\Left;
use PHRamda\Functors\Right;

use function PHRamda\either;

final class EitherTest extends TestCase
{
    public function testEitherHappyCase(): void
    {
        $testValue = true;
        $leftTestValue = "value was null";
        $subject = either($leftTestValue, $testValue);
        $this->assertInstanceOf('\\PHRamda\\Functors\\Either', $subject);
        $this->assertEquals($testValue, $subject->getRight(null));

        $subject = either($leftTestValue, null);
        $this->assertInstanceOf('\\PHRamda\\Functors\\Either', $subject);
        $this->assertEquals(null, $subject->getRight(null));
        $this->assertEquals($leftTestValue, $subject->getLeft(null));
    }

    public function testEitherFilter(): void
    {
        $either = either('Left Value', 'Right Value');
        $this->assertInstanceOf('\\PHRamda\\Functors\\Right', $either);
        $either = $either->filter(function ($value) { return $value === 'Right Value'; }, 'was not right value');
        $this->assertInstanceOf('\\PHRamda\\Functors\\Right', $either);
        $either = $either->filter(function ($value) { return $value === 'Left Value'; }, 'was not left value');
        $this->assertInstanceOf('\\PHRamda\\Functors\\Left', $either);

        $either = either('LeftValue', null);
        $this->assertInstanceOf('\\PHRamda\\Functors\\Left', $either);
        $either = $either->filter(
          function () {
            return false;
          },
          'error message'
        );
        $this->assertInstanceOf('\\PHRamda\\Functors\\Left', $either);
    }

    public function testEitherMap(): void
    {
      $either = either('Left Value', 'Right Value');
      $this->assertInstanceOf('\\PHRamda\\Functors\\Right', $either);
      $this->assertEquals('Right Value', $either->getOrElse(null));

      $either = $either->map('strtoupper');
      $this->assertEquals('RIGHT VALUE', $either->getOrElse(null));
      $this->assertInstanceOf('\\PHRamda\\Functors\\Right', $either);

      $either = Left::of('Left Value');
      $this->assertInstanceOf('\\PHRamda\\Functors\\Left', $either);
      $either = $either->map('strtoupper');
      $this->assertEquals('Left Value', $either->get());
    }

    public function testEitherFlatMap(): void
    {
      $either = Right::of('Right value');
      $this->assertInstanceOf('\\PHRamda\\Functors\\Right', $either);

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

      $this->assertInstanceOf('\\PHRamda\\Functors\\Right', $either);
      $this->assertEquals('RIGHT VALUE', $either->get());
    }
}
