<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use PHRamda\Monads\Monad;
use PHRamda\Monads\Identity as IdentityMonad;
use function PHRamda\foldMonad;

final class FoldMonadTest extends TestCase
{
  public function testHappyCase(): void
  {
    $foldCallback = function ($acc, $item = 0) {
      return IdentityMonad::of($acc + $item);
    };
    $initial = 0;
    $collection = [1, 2, 3, 4, 5, 6];
    $result = foldMonad($foldCallback, $initial, $collection);

    $this->assertEquals(IdentityMonad::of(21), $result);
  }
}
